# Vérifier le login COJUKA sur Hostinger

## État
Code d'inscription, connexion, page « compte en attente », gestion privée et commande d'activation administrateur enregistrés dans GitHub. Aucun test réel sur le serveur n'a été effectué.

## Déployer et vérifier
1. Sauvegarder les fichiers et exporter la base MySQL.
2. Déployer les derniers commits GitHub sur le site Hostinger.
3. Depuis le répertoire Laravel : `composer dump-autoload -o` puis `php artisan optimize:clear`.
4. Vérifier `php artisan route:list --path=connexion`, `php artisan route:list --path=inscription`, `php artisan route:list --path=gestion`.
5. Vérifier dans phpMyAdmin que la table `users` existe et contient la colonne `is_group_admin`. Ne pas publier les données.
6. Visiter `/inscription` et créer un compte avec un mot de passe unique d'au moins 12 caractères. L'inscription n'attribue pas les droits administrateur.
7. Visiter `/connexion` et se connecter : un compte ordinaire doit être dirigé vers `/compte-en-attente`.
8. Dans le terminal SSH de **votre propre serveur**, après vérification de l'identité du propriétaire, exécuter `php artisan cojuka:grant-admin adresse@exemple.com`, puis confirmer.
9. Se déconnecter, se reconnecter, visiter `/gestion` et `/gestion/modules/finances`.
10. Confirmer qu'un compte ordinaire ne peut pas consulter `/gestion` directement (403 attendu).
11. Configurer `APP_DEBUG=false` en production et ne jamais partager le mot de passe MySQL, SSH ou `APP_KEY`.

## Dépannage
- Si `Class App\\Models\\User not found`, vérifier `app/Models/User.php` et `composer dump-autoload -o`.
- Si 403 sur `/gestion`, vérifier la colonne `users.is_group_admin` du compte connecté.
- Si `SQLSTATE[42S02]`, comparer les tables MySQL avec les migrations et corriger les tables manquantes après sauvegarde.
- Si 500, inspecter `storage/logs/laravel.log` et les logs PHP de Hostinger, sans activer les traces détaillées sur le site public.
