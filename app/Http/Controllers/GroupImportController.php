<?php
namespace App\Http\Controllers;

use App\Models\GroupEntity;
use App\Models\GroupProject;
use App\Models\GroupAsset;
use App\Models\GroupSuiteRecord;
use App\Models\GroupSuiteAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GroupImportController
{
    private const CORE = ['entites'=>GroupEntity::class,'projets'=>GroupProject::class,'actifs'=>GroupAsset::class];

    public function template(string $module)
    {
        $fields=$this->columns($module);
        return response()->streamDownload(function() use($fields) {
            $out=fopen('php://output','w');
            fwrite($out,"\xEF\xBB\xBF");
            fputcsv($out,$fields,';');
            fclose($out);
        },'cojuka-modele-'.$module.'.csv',['Content-Type'=>'text/csv; charset=UTF-8']);
    }

    public function import(Request $request,string $module)
    {
        $fields=$this->columns($module);
        $request->validate(['file'=>'required|file|mimes:csv,txt|max:2048']);
        if(!isset(self::CORE[$module])){
            abort_unless(Schema::hasTable('group_suite_records') && Schema::hasTable('group_suite_audit'),503,'Installez les tables du module.');
        }
        $handle=fopen($request->file('file')->getRealPath(),'rb');
        if(!$handle) return back()->withErrors(['file'=>'Fichier illisible.']);
        try{
            $first=fgets($handle);
            if($first===false) return back()->withErrors(['file'=>'Fichier vide.']);
            $delimiter=substr_count($first,';') >= substr_count($first,',') ? ';' : ',';
            rewind($handle);
            $header=fgetcsv($handle,0,$delimiter);
            if(!$header) return back()->withErrors(['file'=>'En-tête CSV manquante.']);
            $header=array_map(fn($s)=>trim(preg_replace('/^\xEF\xBB\xBF/','',(string)$s)),$header);
            if(count($header)!==count(array_unique($header)) || array_diff($fields,$header) || array_diff($header,$fields)){
                return back()->withErrors(['file'=>'Colonnes invalides. Téléchargez le modèle CSV du module.']);
            }
            $items=[];$errors=[];$line=1;
            while(($values=fgetcsv($handle,0,$delimiter))!==false){
                $line++;
                if(count($values)===1 && trim((string)$values[0])==='')continue;
                if($line>501){$errors[]='Limite de 500 lignes par import.';break;}
                if(count($values)!==count($header)){$errors[]="Ligne $line : nombre de colonnes incorrect.";continue;}
                $row=array_combine($header,array_map(fn($v)=>trim((string)$v),$values));
                $row=array_map(fn($v)=>$v===''?null:$v,$row);
                $validator=Validator::make($row,$this->rules($module));
                if($validator->fails()){
                    $errors[]="Ligne $line : ".$validator->errors()->first();
                    continue;
                }
                $items[]=$validator->validated();
            }
            if($errors)return back()->withErrors(['file'=>implode(' | ',array_slice($errors,0,8))]);
            if(!$items)return back()->withErrors(['file'=>'Aucune ligne valide à importer.']);
            DB::transaction(function()use($items,$module,$request){
                foreach($items as $row){
                    if(isset(self::CORE[$module])){
                        $model=self::CORE[$module];
                        if($module==='entites' && array_key_exists('published',$row))$row['published']=(bool)$row['published'];
                        if($module==='projets' && array_key_exists('published',$row))$row['published']=(bool)$row['published'];
                        $model::create($row);
                    }else{
                        $details=[];
                        foreach(array_keys(\App\Http\Controllers\GroupSuiteController::MODULES[$module]['fields']) as $field){
                            if(array_key_exists($field,$row))$details[$field]=$row[$field];
                            unset($row[$field]);
                        }
                        $record=GroupSuiteRecord::create($row+['module'=>$module,'details'=>$details,'created_by'=>$request->user()->id,'updated_by'=>$request->user()->id]);
                        GroupSuiteAudit::create(['user_id'=>$request->user()->id,'action'=>'import','module'=>$module,'record_id'=>$record->id,'before'=>null,'after'=>$record->toArray()]);
                    }
                }
            });
            return back()->with('status',count($items).' enregistrement(s) importé(s) avec succès.');
        }finally{fclose($handle);}
    }

    private function columns(string $module):array
    {
        if($module==='entites')return ['name','slug','type','country','sector','summary','description','website','published'];
        if($module==='projets')return ['group_entity_id','title','category','location','status','start_date','end_date','budget','currency','description','published'];
        if($module==='actifs')return ['group_entity_id','name','kind','location','reference','status','notes'];
        abort_unless(isset(GroupSuiteController::MODULES[$module]),404);
        return array_merge(['group_entity_id','title','reference','status','record_date','amount','currency','location','description'],array_keys(GroupSuiteController::MODULES[$module]['fields']));
    }

    private function rules(string $module):array
    {
        if($module==='entites')return ['name'=>'required|string|max:200','slug'=>'required|alpha_dash|max:200|unique:group_entities,slug','type'=>'required|string|max:80','country'=>'nullable|string|max:100','sector'=>'nullable|string|max:120','summary'=>'nullable|string|max:1500','description'=>'nullable|string','website'=>'nullable|url|max:255','published'=>'nullable|boolean'];
        if($module==='projets')return ['group_entity_id'=>'required|integer|exists:group_entities,id','title'=>'required|string|max:200','category'=>'nullable|string|max:120','location'=>'nullable|string|max:200','status'=>['required',Rule::in(['planifie','en_cours','suspendu','termine'])],'start_date'=>'nullable|date','end_date'=>'nullable|date|after_or_equal:start_date','budget'=>'nullable|numeric|min:0','currency'=>'required|string|size:3','description'=>'nullable|string','published'=>'nullable|boolean'];
        if($module==='actifs')return ['group_entity_id'=>'required|integer|exists:group_entities,id','name'=>'required|string|max:200','kind'=>'required|string|max:120','location'=>'nullable|string|max:200','reference'=>'nullable|string|max:200','status'=>'required|string|max:80','notes'=>'nullable|string'];
        $rules=['group_entity_id'=>'required|integer|exists:group_entities,id','title'=>'required|string|max:255','reference'=>'nullable|string|max:255','status'=>['required',Rule::in(array_keys(GroupSuiteController::STATUSES))],'record_date'=>'nullable|date','amount'=>'nullable|numeric|min:0','currency'=>['required',Rule::in(['USD','CDF','EUR'])],'location'=>'nullable|string|max:255','description'=>'nullable|string|max:5000'];
        foreach(GroupSuiteController::MODULES[$module]['fields'] as $field=>$label)$rules[$field]='nullable|string|max:255';
        return $rules;
    }
}
