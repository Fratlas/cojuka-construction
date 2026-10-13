# COJUKA Group — Suite de gestion multi-entités

## Fonctionnalités implémentées
- Authentification Laravel /connexion ; contrôle administrateur `is_group_admin`.
- Tableau de bord /gestion avec indicateurs des entités, projets, actifs et huit modules.
- CRUD Entités /gestion/entites, Projets /gestion/projets, Actifs /gestion/actifs.
- CRUD RH, finances, contrats, achats, logistique, immobilier, mines et conseil dans /gestion/modules/{module}.
- Données liées à `group_entities` ; filtrage, pagination, validation, montants par devise.
- Journal d'audit des créations, modifications et suppressions des huit modules dans `group_suite_audit`.
- Portail public /groupe/entites et fiches publiées.

## Mise en production sur Hostinger (NE PAS sauter les sauvegardes)
1. Sauvegarder les fichiers Laravel et **exporter la base MySQL**.
2. Comparer les migrations Laravel et les tables SQL créées manuellement dans phpMyAdmin. En cas de colonnes divergentes, les réconcilier avant `migrate`.
3. Vérifier que le domaine sert le répertoire Laravel `public/` (recommandé) et que `.env` n'est pas accessible publiquement.
4. Déployer le dépôt GitHub, dans le répertoire Laravel, puis `composer install --no-dev --optimize-autoloader`.
5. Vérifier `APP_DEBUG=false`, `APP_ENV=production`, `APP_KEY` et `DB_*` sans partager les secrets.
6. `php artisan migrate:status` puis, **seulement après contrôle**, `php artisan migrate --force`.
7. `php artisan db:seed --class=GroupEntitySeeder --force` pour créer les six entités en brouillon (si absentes).
8. Désigner le compte administrateur existant après vérification de son identité. Ne pas promouvoir tous les comptes.
9. `php artisan optimize:clear` et `composer dump-autoload -o`.
10. Vérifier les pages /connexion, /gestion, /gestion/modules/finances, création/édition/suppression, séparation public/privé et les journaux.

## Limites connues
- Le déploiement et les tests sur Hostinger ne sont pas exécutés par ces commits.
- L'interface est un socle opérationnel, **pas un ERP complet certifié**. Comptabilité en partie double, rapprochements bancaires, paie, approbations multi-niveaux, documents sécurisés, rôles granulaires par filiale, exports réglementaires, suivi géospatial des concessions et workflows avancés restent à réaliser.
- Seuls les comptes avec `is_group_admin=1` peuvent accéder à l'ensemble des modules ; ne pas donner ce rôle à des employés sans autorisation globale.
- Les informations sur les participations, permis et titres fonciers issues de l'audio doivent être vérifiées avant publication.
- Les valeurs financières sont stockées par devise : ne jamais sommer USD, CDF et EUR sans conversion explicite.
