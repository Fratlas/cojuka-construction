<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

/**
 * Mise à jour de la base depuis l'interface, pour les hébergements sans accès SSH.
 * Réservé aux administrateurs. Les migrations du projet vérifient ce qui existe déjà
 * avant de créer quoi que ce soit : rien n'est supprimé.
 */
class GroupMaintenanceController
{
    public function migrate(Request $request)
    {
        abort_unless($request->user()?->is_group_admin, 403);
        try {
            Artisan::call('migrate', ['--force' => true]);
            $output = trim(Artisan::output());
            Artisan::call('config:clear');
            Log::info('COJUKA database update from management UI', ['user' => $request->user()->id, 'output' => mb_substr($output, 0, 2000)]);
            $done = substr_count($output, 'DONE');
            return back()->with('status', $done > 0
                ? "Base de données mise à jour ({$done} étape(s) appliquée(s)). Vous pouvez maintenant attribuer les accès."
                : 'La base de données était déjà à jour.');
        } catch (\Throwable $e) {
            Log::error('COJUKA database update failed', ['message' => $e->getMessage()]);
            return back()->withErrors(['admin' => 'La mise à jour a échoué : '.mb_substr($e->getMessage(), 0, 220)]);
        }
    }
}
