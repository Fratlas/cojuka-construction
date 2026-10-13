# Installation COJUKA Construction sur Hostinger

Ce projet utilise Laravel 13, Blade, Bootstrap 5 par CDN et MySQL. Aucun Node.js, npm ou Vite n'est nécessaire.

## Prérequis
- Hébergement avec PHP 8.3 ou supérieur et les extensions requises par Laravel 13
- Composer (sur le serveur ou sur une machine locale)
- Base MySQL

## Installation
1. Cloner ou télécharger le dépôt.
2. Exécuter `composer install --no-dev --optimize-autoloader` dans la racine du projet.
3. Copier `.env.example` vers `.env` et configurer `APP_URL`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME` et `DB_PASSWORD`.
4. Exécuter `php artisan key:generate`.
5. Exécuter `php artisan migrate --force` après avoir sauvegardé la base de données si nécessaire.
6. Configurer le domaine pour pointer vers le dossier `public/` de Laravel.
7. Vérifier les permissions d'écriture de `storage/` et `bootstrap/cache/`.
8. En production, définir `APP_ENV=production` et `APP_DEBUG=false`.

**Sécurité :** ne jamais placer le fichier `.env` ni la racine Laravel dans un dossier accessible publiquement. Si Hostinger ne permet pas de modifier la racine web vers `public/`, adapter le déploiement selon les options de l'hébergement sans exposer les fichiers sensibles.

Bootstrap est chargé par CDN dans la vue Blade. Les dépendances PHP restent nécessaires via Composer.
