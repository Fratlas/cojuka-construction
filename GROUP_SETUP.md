# COJUKA Group — Mise en service

Cette première version est un socle Laravel 13 / Bootstrap CDN / MySQL : portail multi-entités, fiches publiques, projets, actifs et administration protégée.

## Déploiement Hostinger

1. Sauvegarder la base de données et le site existants.
2. Récupérer les nouveaux commits GitHub dans le dossier Laravel.
3. Vérifier PHP 8.3+ et installer les dépendances : `composer install --no-dev --optimize-autoloader`.
4. Vérifier `.env` : `APP_ENV=production`, `APP_DEBUG=false`, `APP_KEY` existante et les paramètres MySQL exacts. Ne jamais committer `.env`.
5. Lancer `php artisan migrate --force` (création des tables `group_entities`, `group_projects`, `group_assets` et du drapeau `users.is_group_admin`).
6. Lancer `php artisan db:seed --class=GroupEntitySeeder --force` : six entités sont créées en **brouillon** (non publiées), à vérifier.
7. Créer un utilisateur administrateur dans une console sécurisée, puis attribuer `is_group_admin=1` uniquement à cet utilisateur. Par exemple via `php artisan tinker` et `App\\Models\\User::where('email','adresse-admin@exemple.com')->update(['is_group_admin'=>true]);` après avoir créé et vérifié le compte. Ne jamais publier de mot de passe ou de clé.
8. Exécuter `php artisan optimize:clear`, vérifier les permissions de `storage` et `bootstrap/cache`.

## URLs
- `/groupe` : page Consulting existante.
- `/groupe/entites` : portail multi-entités.
- `/groupe/entites/{slug}` : fiche publique d'une entité **publiée**.
- `/connexion` : authentification Laravel.
- `/gestion` : tableau de bord administrateur.
- `/gestion/entites`, `/gestion/projets`, `/gestion/actifs` : gestion CRUD.

## Limites de cette première version
Les sites indépendants par entité, la gestion des participations au capital, les droits par filiale, les documents privés, la comptabilité, les workflows et les journaux d'audit restent à développer. Les données sensibles sur les actifs fonciers/miniers ne sont pas rendues publiques. La publication des fiches et projets est désactivée par défaut. Vérifier juridiquement les informations issues de l'enregistrement avant diffusion.

Le portail et le système de gestion nécessitent une base MySQL fonctionnelle. Aucun déploiement Hostinger ni test serveur n'est attesté par ce commit.
