# COJUKA — graphiques de gestion

La suite de gestion dispose de représentations graphiques construites à partir des **enregistrements réels** : aucun jeu de données factice, aucun traqueur ni bibliothèque de graphiques externe.

## Tableau de bord `/gestion`

- **Projets par statut** : graphique circulaire basé sur `group_projects.status`, affiché seulement si l'utilisateur peut consulter les projets.
- **Départements** : barres horizontales dénombrant les dossiers `group_suite_records` par module autorisé.
- **Évolution sur six mois** : courbe SVG des dossiers créés mensuellement, dans le périmètre de l'utilisateur et, éventuellement, de la filiale filtrée.
- **Actifs par catégorie** : barres horizontales regroupant `group_assets.kind`, visibles seulement avec l'accès aux actifs.

Les graphiques ne montrent aucun montant de plusieurs devises agrégé. Les indicateurs financiers existants restent séparés par devise et soumis à l'autorisation Finances.

## Départements

Sur `/gestion/modules/{module}`, le graphique « Suivi graphique des statuts » reprend les mêmes filtres de recherche, de filiale et de statut que le tableau. Il affiche un message clair lorsqu'aucun résultat ne correspond.

## Sécurité et confidentialité

Les agrégats sont calculés côté serveur avec les mêmes critères `GroupAccess::can`, `GroupAccess::entities` et le filtre de filiale que les tableaux existants. Les données RH nominatives, les documents joints et les écritures financières individuelles ne sont pas transférés dans un script de graphiques public. Aucune nouvelle route anonyme n'a été créée.

## Affichage

- Diagrammes circulaires et barres réalisés en CSS.
- Courbe des six derniers mois rendue en SVG avec titre et description accessibles.
- Légendes avec les chiffres exacts, états vides, contrastes gris/bleu nuit, présentation mobile.
- Les graphiques restent disponibles sans Chart.js ni chargement de CDN supplémentaire.
- La présence de la table `group_suite_records` est vérifiée avant les statistiques des modules. Si cette table n'est pas installée, seules les statistiques des projets et actifs existants sont utilisées.

## Emplacements

- `app/Http/Controllers/GroupAdminController.php`
- `app/Http/Controllers/GroupSuiteController.php`
- `resources/views/gestion/partials/dashboard-charts.blade.php`
- `resources/views/gestion/partials/suite-status-chart.blade.php`
- `public/css/cojuka-management-charts.css`

## Mise en production

Aucune migration supplémentaire n'est nécessaire pour ces graphiques. Après déploiement :

```bash
php artisan view:clear
php artisan optimize:clear
```

Tester au minimum un administrateur, un responsable limité à une filiale, un profil n'ayant accès qu'à un département et un cas sans enregistrements. Les tests en environnement réel doivent valider la disposition visuelle sur mobile et ordinateur.
