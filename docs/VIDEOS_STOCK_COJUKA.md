# COJUKA — vidéos documentaires sous licence Pexels

Mise à jour : 21 octobre 2026.

## Principe

Les sections « Documentaire · Images réelles » de l’accueil et de COJUKA Mining complètent les vidéos créatives/générées déjà présentes. Ces clips sont des **vidéos de stock illustratives** et **ne doivent jamais être présentés comme des vidéos prises sur les sites de COJUKA**.

Les cinq fiches ci-dessous proviennent de Pexels et sont réutilisables sur un site commercial sous réserve des conditions de la [licence Pexels](https://www.pexels.com/license/). La licence permet l’utilisation et les modifications gratuitement, sans attribution obligatoire, mais interdit notamment d’impliquer que les personnes ou entreprises filmées soutiennent COJUKA. Les droits additionnels (marques, personnes, propriétés) restent à examiner si le montage ou le contexte évolue.

| Section | Sujet | Auteur | Source |
|---|---|---|---|
| Accueil | Exploitation de carrière | David Pickup | https://www.pexels.com/video/aerial-view-of-industrial-mining-site-operation-30789021/ |
| Accueil | Travaux de construction | Sururi Ballıdağ | https://www.pexels.com/video/men-working-at-a-construction-site-16106604/ |
| Accueil | Port et logistique | Toàn BDS | https://www.pexels.com/video/aerial-view-of-container-port-operations-32746857/ |
| Mining | Site minier et équipements | Be The Observer | https://www.pexels.com/video/mining-site-17627281/ |
| Mining | Engins et chantier industriel | Faisal Ibne Kalam | https://www.pexels.com/video/industrial-construction-site-with-heavy-equipment-39894304/ |

## Technique

- Intégration : `resources/views/partials/cojuka-stock-films.blade.php`.
- **Aucun téléchargement automatique** au chargement de la page : les vidéos conservent `preload=none` et la source ne s’ajoute qu’après un clic sur « Voir la séquence ».
- Une seule vidéo documentaire est lue à la fois sur la page.
- En cas d’erreur, le visiteur peut ouvrir la page du clip sur Pexels.
- Les affiches (« poster ») sont les images de prévisualisation propres aux vidéos.
- Les clips sont muets au départ et peuvent être contrôlés par l’utilisateur.
- Les clips sont hébergés à distance par Pexels : le lecteur doit être testé après déploiement pour vérifier la politique de hotlinking, les erreurs CORS, les performances et la stabilité des URL. Ce n’est pas encore une assurance de disponibilité en production.

### Recommandation avant trafic important

Pour un site rapide, **télécharger les originaux sous la licence applicable**, conserver les preuves de provenance, puis transcoder un extrait adapté (environ 6 à 12 secondes, H.264 MP4, 720p mobile / 1080p desktop, audio coupé si lecture décorative, `-movflags +faststart`). Héberger les fichiers optimisés sur le domaine COJUKA ou un CDN compatible, modifier alors `src` dans le tableau de clips et confirmer la licence et les consentements applicables. Ne pas servir des vidéos UHD/4K directement dans un hero automatique sur les réseaux mobiles.

## Transparence

Pexels n’exige pas de crédit mais le site affiche volontairement la source et l’auteur, et précise qu’il s’agit d’illustrations. Les vidéos existantes du Hero ne sont ni supprimées ni remplacées.
