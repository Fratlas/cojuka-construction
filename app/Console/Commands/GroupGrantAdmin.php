<?php
namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
class GroupGrantAdmin extends Command {
 protected $signature='cojuka:grant-admin {email : Email du compte existant}';
 protected $description='Accorde explicitement les droits administrateur COJUKA à un compte existant';
 public function handle():int {
  $email=trim((string)$this->argument('email'));
  $user=User::where('email',$email)->first();
  if(!$user){$this->error('Compte introuvable. Inscrivez-vous d’abord sur /inscription.');return self::FAILURE;}
  if($user->is_group_admin){$this->info('Ce compte est déjà administrateur.');return self::SUCCESS;}
  $this->warn('Vous allez donner accès à toutes les sociétés, projets, actifs et modules privés.');
  $this->line('Utilisateur : '.$user->name.' <'.$user->email.'>');
  if(!$this->confirm('Confirmer la promotion administrateur ?',false)){$this->info('Annulé.');return self::FAILURE;}
  $user->forceFill(['is_group_admin'=>true])->save();
  $this->info('Compte administrateur activé.');
  return self::SUCCESS;
 }
}