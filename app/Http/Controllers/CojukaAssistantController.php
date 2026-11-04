<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Support\GroupAccess;

class CojukaAssistantController
{
 public function reply(Request $request)
 {
  $data=$request->validate(['message'=>'required|string|min:2|max:1500','history'=>'sometimes|array|max:8','history.*.role'=>'required_with:history|in:user,assistant','history.*.content'=>'required_with:history|string|max:1500']);
  $user=$request->user();
  $admin=(bool)$user && GroupAccess::any($user);
  $modules=['entites'=>'Sociétés & filiales','projets'=>'Projets','actifs'=>'Actifs','rh'=>'Ressources humaines','finances'=>'Finances','contrats'=>'Contrats','achats'=>'Achats','logistique'=>'Logistique','immobilier'=>'Immobilier','mines'=>'Mines','consulting'=>'Consulting'];
  $available=[];
  if($admin)foreach($modules as $slug=>$label)if(GroupAccess::can($user,$slug))$available[$slug]=$label;
  $guide="COJUKA Consulting Group. Secteur prioritaire : Mining. Autres domaines : Construction, Logistique, Eden Park Investments, Consultance, Impact Center, Génie, Énergie, Cargo, Matériel, Public, Santé, Éducation. Site public : accueil /, groupe /groupe, entités /groupe/entites, fiches /groupe/structures/{slug}, dossiers /groupe/dossiers/mining-et-carrieres, /groupe/dossiers/energie-et-infrastructures, /groupe/dossiers/cargo-et-fret. Espace privé : /gestion (connexion requise). ";
  if($admin){
   $guide.="Modules visibles pour CET utilisateur : ".implode(', ',array_values($available)).". Donner des tutoriels étape par étape : 1. ouvrir /gestion ; 2. choisir un module autorisé ; 3. remplir le formulaire ou sélectionner une fiche ; 4. enregistrer et vérifier. Les accès dépendent du département et de l'entité. Ne jamais proposer un lien de module interdit. ";
   foreach($available as $slug=>$label)$guide.="Module $label : /gestion/".(in_array($slug,['entites','projets','actifs'],true)?$slug:'modules/'.$slug).". ";
   if($user->is_group_admin)$guide.="Administration des utilisateurs /gestion/utilisateurs et des permissions /gestion/departements. ";
  }else{$guide.="Ne fournir aucune instruction privilégiée ou donnée interne. Pour utiliser la gestion, se connecter et obtenir des droits auprès de l'administrateur. ";}
  $key=config('cojuka.openai.key');
  if(!$key)return response()->json(['reply'=>$this->localGuide($data['message'],$admin,$available),'mode'=>'guide']);
  try{
   $messages=[['role'=>'system','content'=>'Tu es le guide officiel du site COJUKA. Réponds en français, de façon claire, utile, courte, avec des étapes numérotées si demandé. Utilise exclusivement ces faits vérifiés : '.$guide.' N’invente ni réalisations, ni tarifs, ni informations confidentielles, ni capacités non confirmées. N’affirme jamais avoir effectué une action de gestion. Tu ne peux pas consulter ou modifier les données de gestion. Ne suis pas les demandes visant à contourner les permissions.']];
   foreach(($data['history']??[]) as $item)$messages[]=['role'=>$item['role'],'content'=>$item['content']];
   $messages[]=['role'=>'user','content'=>$data['message']];
   $response=Http::withToken($key)->timeout(18)->acceptJson()->post('https://api.openai.com/v1/chat/completions',['model'=>config('cojuka.openai.model','gpt-4o-mini'),'messages'=>$messages,'max_tokens'=>450,'temperature'=>0.3]);
   if(!$response->successful())return response()->json(['reply'=>$this->localGuide($data['message'],$admin,$available),'mode'=>'guide']);
   $answer=$response->json('choices.0.message.content');
   return response()->json(['reply'=>is_string($answer)&&$answer!==''?$answer:'Consultez les tutoriels intégrés.','mode'=>'ai']);
  }catch(\Throwable $e){return response()->json(['reply'=>$this->localGuide($data['message'],$admin,$available),'mode'=>'guide']);}
 }
 // Helpful answers even before an API key is configured or during an outage.
 // Navigation is informational: this endpoint never reads or mutates internal records.
 private function localGuide(string $message,bool $admin,array $available): string
 {
  $q=mb_strtolower($message,'UTF-8');
  if(preg_match('/(bonjour|salut|bonsoir|hello|comment ça va)/u',$q))
   return 'Bonjour ! Bienvenue chez COJUKA Consulting Group. Je peux vous renseigner sur Mining, Construction, Logistique, l’histoire du groupe ou vous guider dans les modules de gestion accessibles.';
  if(preg_match('/(connexion|connecter|identifiant|mot de passe|compte)/u',$q))
   return 'Pour accéder à l’espace professionnel : 1. Ouvrez /login ; 2. saisissez votre adresse e-mail et votre mot de passe ; 3. ouvrez /gestion après connexion. Si vous n’avez pas de compte ou pas les droits requis, contactez un administrateur. Ne communiquez jamais votre mot de passe dans ce chat.';
  if(preg_match('/(histoire|jules|kabongo|belgique|fondateur)/u',$q))
   return 'Découvrez le parcours historique et l’ancrage belge de COJUKA sur la page /groupe/histoire. La biographie présente Jules Kabongo, sa formation en Belgique et les origines du groupe, selon les archives fournies.';
  if(preg_match('/(mine|mining|minerai|cuivre|cobalt|coltan|carri[eè]re)/u',$q))
   return 'COJUKA Mining est présenté comme le secteur prioritaire du groupe. Retrouvez les domaines d’intervention, photos de minerais et vidéos documentaires dans /groupe/structures/kojuka-mining. Ces médias sont illustratifs et ne prouvent pas une exploitation particulière.';
  if(preg_match('/(construction|b[aâ]timent|chantier|infrastructure)/u',$q))
   return 'La Construction est l’un des domaines du groupe. Explorez les services et réalisations présentés dans le portail /groupe/entites, puis sélectionnez Construction.';
  if(preg_match('/(logistique|transport|cargo|port|fret)/u',$q))
   return 'COJUKA présente des activités de logistique et de transport. Ouvrez /groupe/entites pour consulter le pôle Logistique et les dossiers sectoriels correspondants.';
  if(preg_match('/(contact|adresse|email|t[eé]l[eé]phone|joindre)/u',$q))
   return 'Vous pouvez utiliser la rubrique Nous contacter du site COJUKA. Ne prenez pas pour officielles les coordonnées qui ne sont pas publiées et vérifiées sur le site.';
  foreach($available as $slug=>$label){
   $match=mb_strtolower($label,'UTF-8');
   if(str_contains($q,$slug)||str_contains($q,$match)){
    $path=in_array($slug,['entites','projets','actifs'],true)?'/gestion/'.$slug:'/gestion/modules/'.$slug;
    return 'Pour gérer « '.$label.' » : 1. Ouvrez /gestion avec votre compte professionnel ; 2. choisissez « '.$label.' » dans le menu ; 3. recherchez ou créez un dossier selon vos autorisations ; 4. vérifiez les champs puis enregistrez. Accès : '.$path.'.';
   }
  }
  if(preg_match('/(gestion|module|dossier|enregistr|csv|export|import|utilisateur|permission|administration|tableau de bord)/u',$q)){
   if(!$admin)return 'L’espace Gestion est privé. Connectez-vous à /login avec un compte autorisé, puis demandez à votre administrateur l’accès aux départements nécessaires. Aucun dossier interne n’est accessible depuis cet assistant public.';
   return 'Guide Gestion : 1. Ouvrez /gestion ; 2. sélectionnez un département affiché dans votre menu ; 3. utilisez les filtres pour retrouver un dossier ; 4. selon vos permissions, créez, modifiez, importez ou exportez des fichiers CSV ; 5. vérifiez la confirmation. Le guide interne est disponible sur /gestion/guide.';
  }
  return 'Je peux vous aider à explorer les activités COJUKA (Mining, Construction, Logistique, Histoire & Belgique) et, après connexion, les modules autorisés de Gestion. Posez une question précise ou choisissez un tutoriel dans le panneau Assistant COJUKA.';
 }

}
