# COJUKA — vidéos documentaires sous licence Pexels

Mise à jour : 21 octobre 2026.

## Principe

Les sections « Documentaire · Images réelles » de l’accueil et de COJUKA Mining complètent les vidéos créatives/générées déjà présentes. Ces clips sont des **vidéos de stock illustratives** et **ne doivent jamais être présentés comme des vidéos prises sur les sites de COJUKA**.

Les vingt-cinq fiches ci-dessous proviennent de Pexels et sont réutilisables sur un site commercial sous réserve des conditions de la [licence Pexels](https://www.pexels.com/license/). La licence permet l’utilisation et les modifications gratuitement, sans attribution obligatoire, mais interdit notamment d’impliquer que les personnes ou entreprises filmées soutiennent COJUKA. Les droits additionnels (marques, personnes, propriétés) restent à examiner si le montage ou le contexte évolue.

| Section | Sujet | Auteur | Source |
|---|---|---|---|
| Accueil | Exploitation de carrière | David Pickup | https://www.pexels.com/video/aerial-view-of-industrial-mining-site-operation-30789021/ |
| Accueil | Travaux de construction | Sururi Ballıdağ | https://www.pexels.com/video/men-working-at-a-construction-site-16106604/ |
| Accueil | Port et logistique | Toàn BDS | https://www.pexels.com/video/aerial-view-of-container-port-operations-32746857/ |
| Mining | Site minier et équipements | Be The Observer | https://www.pexels.com/video/mining-site-17627281/ |
| Mining | Engins et chantier industriel | Faisal Ibne Kalam | https://www.pexels.com/video/industrial-construction-site-with-heavy-equipment-39894304/ |
| Accueil | Bétonnage sur chantier de pont | SÀI GÒN CÔNG TY CP SẢN XUẤT - THƯƠNG MẠI | https://www.pexels.com/video/construction-site-with-workers-and-crane-35039426/ |
| Accueil | Chantier avec grue et ouvriers | The Capturist | https://www.pexels.com/video/construction-site-with-crane-and-workers-31290739/ |
| Accueil | Manutention de conteneurs | Dominik Zítka | https://www.pexels.com/video/container-loader-operating-at-a-busy-shipping-port-31750579/ |
| Accueil | Port vu du ciel | 8K | https://www.pexels.com/video/lifting-equipment-for-cargo-containers-6618033/ |
| Mining | Bulldozer en carrière | 8K | https://www.pexels.com/video/bulldozer-in-action-at-quarry-site-30911573/ |
| Mining | Carrière industrielle aérienne | Toàn BDS | https://www.pexels.com/video/aerial-view-of-industrial-quarry-in-operation-31100080/ |
| Mining | Camion de mine vu par drone | 8K | https://www.pexels.com/video/drone-aerial-view-of-mining-dump-truck-30911540/ |
| Mining | Excavatrice en mine à ciel ouvert | celal keser | https://www.pexels.com/video/excavator-operating-in-open-pit-mine-35357100/ |
| Mining | Excavatrice chargeant un camion | celal keser | https://www.pexels.com/video/excavator-loading-dump-truck-in-quarry-site-36251027/ |
| Mining | Carrière de sable aérienne | Progga Media | https://www.pexels.com/video/aerial-view-of-sand-quarry-and-industrial-excavation-35025143/ |
| Accueil | Grand chantier urbain en accéléré | Site Engine | https://www.pexels.com/video/timelapse-video-of-a-construction-site-5513060/ |
| Accueil | Ingénieurs en réunion technique | Gustavo Fring | https://www.pexels.com/video/three-men-in-a-meeting-6285700/ |
| Accueil | Manutention de conteneurs (vertical) | Mike Hongkong 2 | https://www.pexels.com/video/vehicle-carrying-container-in-warehouse-11801939/ |
| Accueil | Chantier et grues en accéléré | Site Engine | https://www.pexels.com/video/construction-workers-at-a-construction-site-7825537/ |
| Mining | Camions et excavatrices en carrière | Musko io | https://www.pexels.com/video/aerial-video-of-trucks-on-a-mining-site-8382433/ |
| Mining | Engins en activité dans une carrière | Musko io | https://www.pexels.com/video/drone-footage-of-trucks-working-in-a-quarry-8382436/ |
| Mining | Extraction minière aérienne | Musko io | https://www.pexels.com/video/drone-shot-of-a-mine-7779603/ |
| Mining | Mine à ciel ouvert et camions | Siarhei Dalivelia | https://www.pexels.com/video/an-aerial-view-of-a-quarry-with-trucks-17275464/ |
| Mining | Camion sur piste d’exploitation | Kevin Krämer | https://www.pexels.com/video/drone-footage-of-a-truck-driving-on-a-mining-site-9310149/ |
| Mining | Excavatrice chargeant un camion | Rhys Abel | https://www.pexels.com/video/a-back-hoe-excavator-putting-soil-in-a-truck-6565442/ |

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

### Extension HD / 4K du 21 octobre 2026

La médiathèque inclut maintenant **15 clips distincts** : **7 sur l’accueil** et **8 sur la page COJUKA Mining**, dont dix nouveaux originaux Pexels retrouvés depuis le téléchargement officiel du site. Les noms MP4 internes sont dérivés des redirections de téléchargement Pexels : aucun nom de fichier MP4 n’a été supposé.

Les étiquettes `HD` et `4K` correspondent aux dimensions dans les noms de fichiers MP4 proposés par la source Pexels. **Elles ne constituent pas une mesure de débit ni une garantie que tous les navigateurs liront ces fichiers sans délai**. Certains originaux 4K sont volumineux : le mode `preload=none`, la lecture au clic et l’arrêt des autres vidéos restent indispensables. Le site utilise pour chaque clip sa vignette de prévisualisation Pexels et présente la source originale.

Les fichiers demeurent sur le CDN de Pexels, sans copie des originaux dans le dépôt GitHub. Les liens directs ont été identifiés à partir de la redirection des téléchargements officiels, mais le chargement réseau final sur `cojuka.com` doit être contrôlé après déploiement (hotlinking, débit et disponibilité). Pour un hébergement autonome, stocker et optimiser légalement une copie localement après avoir vérifié les droits des sujets et lieux visibles.

### Extension à 25 vidéos HD / 4K — 21 octobre 2026

La médiathèque contient désormais **25 vidéos réelles distinctes : 11 sur l’accueil et 14 dans COJUKA Mining**. Dix séquences supplémentaires ont été ajoutées, chacune avec une fiche de provenance Pexels, un auteur, une vignette de prévisualisation et le lien direct de téléchargement MP4 relevé depuis la redirection officielle de Pexels. Les noms MP4 n’ont pas été devinés.

**Affichage progressif :** les six premières vidéos de chaque galerie apparaissent immédiatement. Un bouton « Afficher les autres vidéos » révèle les suivantes, tandis que les fichiers MP4 ne sont demandés qu’après clic sur une vidéo. Sans JavaScript, toutes les cartes restent affichées avec leurs liens vers la source.

**Attention à la résolution :** certains fichiers sont Full HD 1920 × 1080 ou HD vertical 1080 × 1920 ; la majorité des ajouts sont 4K 3840 × 2160. Il n’est pas conseillé de charger les originaux UHD automatiquement, surtout sur les réseaux mobiles. La séquence verticale de manutention est affichée sans recadrage dans le lecteur.

**Licences et vérification en production :** tous les clips ont une page Pexels sous [licence Pexels](https://www.pexels.com/license/). Leur utilisation dans COJUKA est illustrative et ne signifie pas que les entreprises ou les personnes visibles soutiennent le groupe. La redirection du lien de téléchargement a été vérifiée lors de l’intégration, mais la lecture directe sur `cojuka.com` et les politiques éventuelles de hotlinking du CDN doivent être testées après déploiement. Il est recommandé de conserver une preuve des licences et d’héberger des transcodages optimisés après validation.
