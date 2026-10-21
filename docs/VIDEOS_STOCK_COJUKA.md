# COJUKA — vidéos documentaires sous licence Pexels

Mise à jour : 21 octobre 2026.

## Principe

Les sections « Documentaire · Images réelles » de l’accueil et de COJUKA Mining complètent les vidéos créatives/générées déjà présentes. Ces clips sont des **vidéos de stock illustratives** et **ne doivent jamais être présentés comme des vidéos prises sur les sites de COJUKA**.

Les quinze fiches ci-dessous proviennent de Pexels et sont réutilisables sur un site commercial sous réserve des conditions de la [licence Pexels](https://www.pexels.com/license/). La licence permet l’utilisation et les modifications gratuitement, sans attribution obligatoire, mais interdit notamment d’impliquer que les personnes ou entreprises filmées soutiennent COJUKA. Les droits additionnels (marques, personnes, propriétés) restent à examiner si le montage ou le contexte évolue.

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
