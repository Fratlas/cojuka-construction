# COJUKA — Mise en service du contrôle d'accès départemental

## Ce qui est désormais implémenté
- Un super administrateur (is_group_admin=1) peut administrer tous les modules.
- Les autres utilisateurs doivent appartenir à un département actif et disposer de permissions explicites (view/create/update/delete/export).
- Les permissions sont contrôlées par middleware sur chaque route, pas seulement dans le menu.
- Chaque collaborateur est limité aux filiales autorisées par group_user_entity_access.
- Les requêtes de lecture, création, modification, suppression, export et import CSV sont filtrées/vérifiées.
- Les pages /gestion/utilisateurs et /gestion/departements sont réservées aux super administrateurs.
- Les nouveaux inscrits n'ont aucun accès par défaut.
- Les actions non autorisées renvoient HTTP 403.

## Installation sur Hostinger
1. Sauvegarder **les fichiers du site ET la base MySQL**. Prévoir une fenêtre de maintenance et un plan de retour arrière.
2. Vérifier que le projet Laravel et la base sélectionnée dans phpMyAdmin correspondent bien à cojuka.com.
3. Déployer d'abord le code sur un environnement de préproduction. La mise à jour simultanée du schéma et du code évite les erreurs.
4. Si la base Laravel est déjà initialisée, exécuter dans phpMyAdmin `database/sql/COJUKA_SCHEMA_COMPLET_ET_ACCES_2026.sql`. Ne jamais exécuter sur une base non sauvegardée.
5. Si vous utilisez le système de migrations Laravel, privilégier `php artisan migrate --force` sur la préproduction, et **ne pas mélanger** des modifications manuelles divergentes.
6. `php artisan optimize:clear` puis `php artisan route:list`. Vérifier les logs Laravel et les erreurs PHP.
7. Avec un compte super administrateur existant, ouvrir `/gestion/departements` pour définir les droits puis `/gestion/utilisateurs` pour affecter chaque utilisateur à son département ET à ses filiales.
8. Tester les autorisations avec plusieurs comptes de test avant production.

## Matrice de contrôle minimale (tests manuels indispensables)
- Utilisateur non affecté : aucune page /gestion autorisée.
- RH limité à une filiale : RH visible, Finances/Mines interdits (403), autre filiale invisible et inaccessible par ID.
- Finances lecture seule : index autorisé ; POST, PUT, DELETE, export CSV refusés.
- Logistique avec création : ajout dans filiale autorisée accepté ; ajout dans filiale interdite refusé.
- Import CSV : import avec un group_entity_id non autorisé refusé intégralement.
- Changement d'entité d'un dossier existant vers une filiale interdite refusé.
- Direction non superadmin sans permissions : accès refusé par défaut.
- Super administrateur : gestion des départements et utilisateurs accessible.
- Dernier super administrateur : retrait des droits refusé.
- Export et historique : aucun enregistrement d'une autre filiale visible.

## Limites restantes / avant validation production
- Les modules métiers existants utilisent des fiches génériques : la comptabilité à double entrée, la paie légale, les validations multi-niveaux, les pièces jointes, la signature, les rapprochements bancaires et les notifications ne sont PAS encore des systèmes métiers complets.
- La piste d'audit des suppressions est conservée, mais la visibilité des événements après suppression et les historiques multi-entités méritent un schéma d'audit dédié à l'entité.
- Les tests automatisés Laravel et les tests de pénétration n'ont pas encore été exécutés.
- Le SQL utilise CREATE TABLE IF NOT EXISTS : il ne répare pas automatiquement une table préexistante dont les colonnes sont différentes.
- Les opérations critiques doivent être testées sur une copie de la base avant de toucher la production.
