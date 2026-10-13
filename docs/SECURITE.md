# Sécurité et déploiement Hostinger

## Obligatoire avant mise en ligne
- Utiliser PHP 8.3+ compatible avec Laravel 13 et activer les extensions requises.
- Pointer le domaine **uniquement** vers le répertoire `public/` (document root). Ne jamais rendre accessible la racine du projet.
- Configurer `.env` hors du répertoire public : `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://votre-domaine.tld`, `APP_KEY` générée par `php artisan key:generate`.
- Ne jamais publier les identifiants MySQL, `.env`, `vendor/`, les sauvegardes SQL ou les journaux.
- Activer un certificat SSL valide et la redirection HTTPS au niveau Hostinger. Ajouter HSTS seulement après vérification du HTTPS sur tous les sous-domaines concernés.
- Restreindre les permissions des fichiers; rendre seulement `storage/` et `bootstrap/cache/` inscriptibles par PHP.
- Utiliser un compte MySQL dédié avec permissions minimales; protéger hPanel et GitHub avec MFA.
- Exécuter `composer install --no-dev --optimize-autoloader` puis `composer audit`; maintenir les dépendances à jour.
- Effectuer des sauvegardes régulières de MySQL et tester la restauration.
- Exécuter `php artisan config:cache` et `php artisan view:cache` après configuration; `php artisan optimize:clear` après changement d'environnement si nécessaire.

## Vérifications
- Contrôler que `https://votre-domaine.tld/.env` et `https://votre-domaine.tld/composer.json` ne divulguent rien (403/404).
- Vérifier les en-têtes HTTP (X-Content-Type-Options, X-Frame-Options, Referrer-Policy).
- Vérifier les formulaires POST avec `@csrf` et valider les entrées serveur.
- Les ressources Bootstrap utilisent un CDN avec attributs SRI. Ajouter une Content-Security-Policy adaptée après inventaire des scripts et styles; les styles inline actuels nécessitent une adaptation.
- Vérifier les versions installées et l'hébergement : cet audit porte uniquement sur les fichiers du dépôt, pas sur le serveur réel.

## Note
Les fichiers du dépôt constituent une structure initiale, non une installation Laravel complète validée en exécution. Avant production, compléter les fichiers Laravel requis, installer Composer et réaliser des tests.
