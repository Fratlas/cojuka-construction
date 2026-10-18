# COJUKA — Gestion hiérarchique, registres, documents et CSV

## Déploiement sur Laravel (production)

1. Sauvegarder la base MySQL et les fichiers privés avant toute intervention.
2. Mettre à jour les fichiers du dépôt GitHub sur l'hébergement.
3. Depuis la racine Laravel, exécuter `php artisan migrate --force`.
4. Exécuter `php artisan optimize:clear` et vérifier les autorisations d'écriture de `storage/`.
5. Dans **Gestion → Utilisateurs & accès**, attribuer les rôles, les départements et les filiales.
6. Vérifier les droits par catégorie avec un compte de test non administrateur.

La migration `2026_10_18_000100_add_group_identity_roles_and_private_documents.php` ajoute les colonnes sans détruire de données. Elle n'efface aucune table en cas de retour arrière.

## Hiérarchie

| Rôle | Autorisations maximales |
|---|---|
| Administration générale | Toutes les filiales et opérations ; gestion des utilisateurs et départements |
| Responsable | Lecture, création, modification, suppression et export, **uniquement si accordés au département**, dans les filiales affectées |
| Collaborateur | Lecture, création, modification, selon le département et les filiales ; jamais de suppression ni d'export |
| Lecture seule | Consultation uniquement, dans les modules et filiales autorisés |

La permission du département est toujours nécessaire pour un utilisateur qui n'est pas administrateur. Les utilisateurs nouvellement inscrits ne reçoivent aucun département et restent sans accès tant que la direction ne les autorise pas. Le drapeau historique `is_group_admin` reste l'autorité réelle de l'administrateur, afin de conserver les comptes existants.

## Sociétés / filiales

Dans **Gestion → Sociétés & filiales → Ajouter / Modifier** les éléments suivants sont *facultatifs* : RCCM, ID.NAT, NIF, numéro d'impôt, CNSS, adresse du siège, téléphone, e-mail professionnel, représentant légal, date d'immatriculation. Les champs administratifs ne sont pas publiés automatiquement sur les pages vitrines.

## Pièces justificatives (facultatives)

Dans **Sociétés & filiales → Documents** : RCCM, ID.NAT, NIF, statuts, agrément, CNSS, licences et autres.
Dans **RH → Documents** (sur la ligne du collaborateur) : contrat, pièce d'identité, diplôme, attestation et habilitations.

Formats : PDF, JPG/JPEG, PNG, WebP ; maximum 10 Mo / fichier. Sur l'hébergement, vérifier les paramètres PHP `upload_max_filesize >= 10M` et `post_max_size >= 12M` ainsi que l'espace disque disponible. Le formulaire fonctionne avec un document déjà numérisé ou une photo prise avec le téléphone. Ce module n'effectue **pas** de reconnaissance OCR ni de scan multipage intégré.

Les fichiers sont stockés sur le disque Laravel `local` (privé) sous `cojuka-private/`, **jamais** sur le disque public. Leur téléchargement nécessite une connexion et les permissions de module et de filiale. Ne créez pas de lien symbolique public vers ce dossier. Éviter le stockage de données médicales ou inutiles. Pour un usage RH en production, définir la politique d'accès, la durée de conservation, les sauvegardes chiffrées et, si nécessaire, un contrôle antivirus côté serveur.

## Import et export CSV

Chaque module métier (entités, projets, actifs, RH, finances, contrats, achats, logistique, immobilier, mines, consulting) dispose d'un import et d'un export CSV. Les modèles CSV sont téléchargeables depuis le bouton **Importer CSV**. Les exports des modules métiers suivent désormais les mêmes colonnes que les modèles d'import, y compris les détails par module.

- Délimiteur : point-virgule (`;`), codage UTF-8 avec BOM.
- Maximum d'import métier : 500 lignes et 2 Mo.
- L'import ajoute les enregistrements ; il ne fait pas de remplacement ni de fusion automatique. Vérifier l'unicité (par exemple `slug` des sociétés) avant un réimport.
- Les exports sont réservés aux rôles autorisés et aux filiales affectées.
- Les documents PDF/images ne sont pas inclus dans les exports CSV, afin de ne pas exposer de fichiers privés.

La gestion des utilisateurs permet un import/export séparé des **droits des comptes déjà enregistrés**, sans mot de passe (200 lignes, 1 Mo). Les départements permettent un import/export de la **matrice des permissions** des départements existants (1 000 lignes, 1 Mo). Ces imports sensibles nécessitent un compte administrateur.

**Attention** : les imports de rôles et de permissions prennent effet immédiatement ; toujours conserver une sauvegarde CSV et vérifier les colonnes avant validation.

## Vérifications recommandées

- Connexion d'un administrateur existant et d'un collaborateur limité.
- Création puis téléchargement d'un document PDF RH ; vérifier qu'un utilisateur d'une autre filiale obtient 403.
- Modification des informations RCCM/ID.NAT sans pièces jointes.
- Export CSV RH puis contrôle du contenu des colonnes supplémentaires.
- Vérification de chaque module avec une ligne de test CSV ; ne pas réimporter en masse un export complet avant sauvegarde.
