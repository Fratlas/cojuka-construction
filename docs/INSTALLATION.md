# Installation locale

Ce dépôt est destiné à une application Laravel 13 avec Bootstrap 5 et MySQL.

1. Installer PHP et Composer, puis créer une application Laravel 13 dans un dossier local distinct.
2. Copier les fichiers de ce dépôt dans cette application en conservant les fichiers Laravel générés.
3. Exécuter `composer install`.
4. Copier `.env.example` vers `.env`, configurer MySQL, puis lancer `php artisan key:generate`.
5. Créer la base `cojuka_construction`, puis exécuter `php artisan migrate`.
6. Lancer `php artisan serve`.

Les dépendances `vendor` et `node_modules` ne sont pas versionnées. Ne jamais publier le fichier `.env`.
