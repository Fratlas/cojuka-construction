# COJUKA — interface Gestion adaptée au mobile

Date : 31 octobre 2026.

## Périmètre

La version responsive est intégrée au layout partagé `resources/views/gestion/group-layout.blade.php`. Elle s'applique ainsi aux pages de gestion qui héritent de ce layout : tableau de bord, graphiques, filiales, projets, actifs, dossiers et documents, RH, permissions, utilisateurs, newsletter, finances, mining, achats, logistique, consultance et autres modules de gestion.

Fichiers :
- `public/css/cojuka-admin-mobile.css` : mise en page responsive et modales.
- `public/js/cojuka-admin-mobile.js` : tiroir de navigation et aide aux tableaux larges.
- `resources/views/gestion/group-layout.blade.php` : inclusion des deux fichiers et bouton de fermeture.

## Fonctionnement

À 900 px de largeur et en dessous :
- le menu latéral devient un tiroir, fermé par défaut, avec un fond assombri, un bouton de fermeture, le clic à l'extérieur ou Échap ;
- lors de l'ouverture le focus clavier est placé dans le tiroir ; Tab reste dans le menu, puis le focus revient au bouton à la fermeture ;
- le défilement du contenu derrière le tiroir est bloqué sans empêcher celui de la navigation elle-même ;
- le titre et la barre supérieure se réorganisent ; les actions et les filtres reviennent à la ligne ;
- les tableaux gardent **toutes leurs colonnes**, et défilent horizontalement avec aide visuelle lorsque nécessaire ;
- les graphiques, indicateurs et légendes se redimensionnent ;
- les fenêtres modales (création, modification, import CSV) tiennent dans l'écran avec formulaire défilable et boutons utilisables ;
- les champs de saisie restent à 16 px au moins sur téléphone, afin de limiter le zoom automatique sur iOS.

**Attention :** les petits tableaux ne sont pas transformés automatiquement en cartes. Les colonnes, identifiants, formulaires et actions restent visibles par défilement horizontal pour ne pas dégrader l'administration ni la traçabilité.

## Contrôles manuels après déploiement

1. Tester les largeurs **320, 360, 375, 390, 430, 768, 900 et 1024 px**.
2. Ouvrir et fermer le menu avec le bouton, le fond assombri et Échap. Confirmer que les liens restent opérationnels et que le menu peut défiler sur un écran court.
3. Vérifier un administrateur et un utilisateur départemental : seuls les modules autorisés doivent être proposés.
4. Ouvrir tableaux, filtres et graphiques sur `/gestion` et sur au moins deux modules.
5. Créer/modifier un enregistrement, ouvrir la fenêtre d'import CSV et vérifier que le bouton d'enregistrement reste atteignable sous le clavier virtuel.
6. Vérifier la consultation et le téléchargement de documents sans exposer les pièces privées à un utilisateur non autorisé.
7. Confirmer la visibilité des messages de validation, des boutons de pagination, et des actions de suppression.
8. Tester portrait/paysage et mode sombre/clair, si activé dans la partie gestion.

## Limites de validation

Les fichiers ont été contrôlés statiquement (JavaScript et équilibre des accolades CSS). Les comportements sur Android, iPhone et dans le navigateur du serveur COJUKA doivent être validés après déploiement. Cette mise à jour ne modifie ni schéma de données, ni authentification, ni contrôleurs, ni hiérarchies d'autorisation.
