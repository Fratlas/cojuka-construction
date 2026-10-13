<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\GroupEntity;
class GroupEntitySeeder extends Seeder {
 public function run():void {
  foreach([
   ['name'=>'COJUKA Construction','slug'=>'construction','type'=>'direction','sector'=>'Construction','summary'=>'Direction des activités de construction du groupe.'],
   ['name'=>'COJUKA Logistique','slug'=>'logistique','type'=>'direction','sector'=>'Logistique','summary'=>'Direction des activités logistiques du groupe.'],
   ['name'=>'COJUKA Consulting','slug'=>'consulting','type'=>'direction','sector'=>'Conseil','summary'=>'Consultance pour entreprises, organismes privés et institutions publiques.'],
   ['name'=>'Eden Park Investment','slug'=>'eden-park-investment','type'=>'societe','sector'=>'Immobilier','summary'=>'Investissement immobilier, actifs fonciers et développement de projets immobiliers.'],
   ['name'=>'Impact Center','slug'=>'impact-center','type'=>'participation','country'=>'Belgique','sector'=>'Services','summary'=>'Société de droit belge présentée comme participation majoritaire du groupe.'],
   ['name'=>'COJUKA Mining','slug'=>'cojuka-mining','type'=>'societe','country'=>'RDC','sector'=>'Mines','summary'=>'Activités et actifs miniers dans le Haut-Katanga.'],
  ] as $row){GroupEntity::firstOrCreate(['slug'=>$row['slug']],$row+['published'=>false]);}
 }
}