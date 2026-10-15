<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GroupProfileController
{
    public const PROFILES = [
        'eden-park-investments' => [
            'mission'=>'Accompagner une stratégie patrimoniale durable en reliant l’identification d’opportunités, la préparation des projets et le suivi des actifs immobiliers.',
            'vision'=>'Favoriser une lecture à long terme de l’investissement immobilier, fondée sur l’analyse des territoires, la qualité de l’information et la coordination des parties prenantes.',
            'audiences'=>[
                ['Propriétaires et porteurs de projets','Échanges autour des actifs, du foncier et des possibilités de développement.'],
                ['Investisseurs et partenaires','Présentation d’opportunités documentées et de cadres de collaboration à étudier.'],
                ['Professionnels de l’immobilier','Dialogue avec les expertises techniques, juridiques et opérationnelles concernées.'],
            ],
            'deliverables'=>[
                ['Dossier d’opportunité','Contexte, caractéristiques et points de vigilance d’une initiative immobilière.'],
                ['Plan de développement','Étapes, acteurs et priorités pour organiser la progression d’un projet.'],
                ['Suivi patrimonial','Vue structurée des informations et échéances relatives aux actifs.'],
            ],
            'faq'=>[
                ['Eden Park Investments intervient-elle uniquement en RDC ?','La présentation du groupe mentionne des actifs et projets au Congo ainsi qu’à l’international.'],
                ['Peut-on consulter la liste des biens ?','Un catalogue public ne sera présenté qu’après validation des informations et des droits de publication.'],
                ['Comment proposer un partenariat ?','Utilisez le contact du groupe en précisant la localisation et la nature du projet.'],
            ],
            'intro'=>'Notre approche immobilière',
            'details'=>'L’investissement immobilier s’inscrit dans une logique de valorisation patrimoniale, de suivi des opportunités foncières et de développement de projets. Cette page présente les orientations de la société sans préjuger du statut d’un projet ou de sa commercialisation.',
            'services'=>[
                ['Études et opportunités','Identification et analyse des opportunités foncières et immobilières.'],
                ['Gestion des actifs','Organisation des informations relatives aux actifs et à leur valorisation.'],
                ['Développement de projets','Préparation et suivi des initiatives immobilières en RDC et à l’étranger.'],
                ['Partenariats','Recherche de complémentarités avec les professionnels et investisseurs.'],
            ],
            'method'=>[
                ['Analyser','Comprendre le contexte foncier, immobilier et réglementaire.'],
                ['Structurer','Définir les priorités, intervenants et étapes du projet.'],
                ['Suivre','Organiser les informations et les jalons de développement.'],
            ],
            'video_url'=>'https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_f0cb1b1f-ca52-4d3b-9ef4-9751e402d355.mp4',
            'video'=>'eden-park-investments.mp4',
            'name'=>'Eden Park Investments',
            'category'=>'Investissement immobilier · SA',
            'location'=>'RDC et international',
            'summary'=>'Société d’investissement immobilier disposant d’actifs fonciers et immobiliers et de projets au Congo et à l’étranger.',
            'headline'=>'Investir dans les territoires de demain.',
            'description'=>'Eden Park Investments est présentée comme la société d’investissement immobilier du groupe. Son portefeuille comprend des actifs fonciers et immobiliers. Elle développe des projets en République démocratique du Congo et à l’international.',
            'focus'=>[
                ['Patrimoine foncier','Valorisation et suivi des actifs fonciers.'],
                ['Investissement immobilier','Développement d’actifs et d’opportunités immobilières.'],
                ['Projets internationaux','Déploiement de projets au Congo et à l’étranger.'],
            ],
        ],
        'impact-center' => [
            'mission'=>'Créer un espace de visibilité pour la participation belge du groupe et faciliter la structuration de coopérations internationales pertinentes.',
            'vision'=>'Développer des passerelles professionnelles entre partenaires, territoires et projets, dans un cadre documenté et progressif.',
            'audiences'=>[
                ['Partenaires institutionnels','Échanges exploratoires autour de coopérations et d’initiatives transfrontalières.'],
                ['Entreprises et réseaux','Identification de complémentarités avec l’écosystème du groupe.'],
                ['Porteurs de projets','Orientation vers les interlocuteurs et entités concernés selon les besoins.'],
            ],
            'deliverables'=>[
                ['Fiche de partenariat','Présentation des objectifs, interlocuteurs et champs de collaboration.'],
                ['Note de cadrage','Définition du périmètre et des étapes d’une initiative.'],
                ['Suivi des échanges','Documentation des décisions et des prochaines actions.'],
            ],
            'faq'=>[
                ['Où se situe Impact Center ?','Impact Center est présenté comme une société de droit belge.'],
                ['Quel est son lien avec COJUKA ?','Le groupe indique détenir une participation majoritaire dans cette société.'],
                ['Quels programmes sont ouverts ?','Les programmes et activités spécifiques seront publiés après confirmation par la structure.'],
            ],
            'intro'=>'Une passerelle internationale',
            'details'=>'Cette participation belge contribue à la dimension internationale du groupe. Les collaborations, programmes et projets propres à Impact Center pourront être présentés progressivement après validation de leurs informations.',
            'services'=>[
                ['Présence en Belgique','Présentation de l’ancrage juridique et institutionnel en Belgique.'],
                ['Réseau de partenaires','Mise en relation et identification de coopérations possibles.'],
                ['Échanges internationaux','Facilitation des échanges d’information entre structures.'],
                ['Projets à documenter','Espace prévu pour les initiatives validées et leurs actualités.'],
            ],
            'method'=>[
                ['Identifier','Repérer les domaines de collaboration pertinents.'],
                ['Connecter','Mettre en relation les interlocuteurs concernés.'],
                ['Développer','Suivre les initiatives validées par les parties prenantes.'],
            ],
            'video_url'=>'https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_8f302433-e777-48ad-8276-d1ba77f268cf.mp4',
            'video'=>'impact-center.mp4',
            'name'=>'Impact Center',
            'category'=>'Participation internationale',
            'location'=>'Belgique',
            'summary'=>'Société de droit belge détenue majoritairement par COJUKA Group.',
            'headline'=>'Une participation tournée vers l’international.',
            'description'=>'Impact Center est une société de droit belge dans laquelle COJUKA Group détient une participation majoritaire. Sa présence illustre la dimension internationale de l’écosystème du groupe.',
            'focus'=>[
                ['Participation stratégique','Développement d’une présence du groupe en Belgique.'],
                ['Coopération','Mise en relation et synergies avec les autres entités.'],
                ['Développement','Présentation des initiatives et projets à venir après validation.'],
            ],
        ],
        'kojuka-mining' => [
            'mission'=>'Structurer la présentation et le développement progressif des activités minières du groupe, avec une attention particulière à la documentation et à la coordination des projets.',
            'vision'=>'Contribuer à un développement minier organisé, tenant compte des exigences techniques, administratives, environnementales et sociales applicables.',
            'audiences'=>[
                ['Partenaires techniques','Échanges sur les études, besoins et modalités d’intervention à documenter.'],
                ['Acteurs institutionnels','Présentation des orientations et des informations publiques validées.'],
                ['Partenaires opérationnels','Coordination éventuelle des compétences nécessaires aux projets.'],
            ],
            'deliverables'=>[
                ['Dossier de périmètre','Informations de localisation et pièces disponibles sous réserve de vérification.'],
                ['Feuille de route','Priorités d’études, d’autorisations et de préparation opérationnelle.'],
                ['Tableau de suivi','Jalons, responsables et documents nécessaires au pilotage.'],
            ],
            'faq'=>[
                ['Où se trouvent les zones mentionnées ?','La présentation institutionnelle situe environ cinquante carrés miniers dans la zone 30 du Haut-Katanga.'],
                ['Les titres miniers sont-ils consultables ?','Les titres et autorisations doivent être vérifiés auprès des autorités et documents compétents ; cette page ne constitue pas une preuve de validité.'],
                ['La société exploite-t-elle déjà les sites ?','Les informations disponibles indiquent un développement d’activités, sans permettre de confirmer le stade d’exploitation de chaque périmètre.'],
            ],
            'intro'=>'Une activité ancrée au Haut-Katanga',
            'details'=>'La présentation institutionnelle fait état d’environ cinquante carrés miniers dans la zone 30. La page décrit les orientations de développement, sans remplacer la vérification des titres, autorisations, études ou informations techniques nécessaires à toute opération.',
            'services'=>[
                ['Périmètres miniers','Centralisation des informations relatives aux zones d’intérêt.'],
                ['Études et documentation','Préparation des éléments techniques et administratifs à valider.'],
                ['Développement des opérations','Planification des étapes et besoins des activités minières.'],
                ['Coordination logistique','Articulation possible avec les fonctions logistiques du groupe.'],
            ],
            'method'=>[
                ['Documenter','Rassembler les informations et justificatifs pertinents.'],
                ['Évaluer','Étudier les contraintes techniques et opérationnelles.'],
                ['Planifier','Définir les étapes de développement appropriées.'],
            ],
            'video_url'=>'https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_e24a7720-8b37-44eb-aa21-d63f68adde8b.mp4',
            'video'=>'kojuka-mining.mp4',
            'name'=>'Kojuka Mining',
            'category'=>'Activités minières · SA',
            'location'=>'Zone 30, Haut-Katanga, RDC',
            'summary'=>'Société minière disposant d’environ cinquante carrés miniers dans la zone stratégique dite « zone 30 » au Haut-Katanga.',
            'headline'=>'Développer les ressources de manière structurée.',
            'description'=>'Kojuka Mining poursuit le développement de ses activités minières au Haut-Katanga. Selon la présentation institutionnelle du groupe, la société dispose d’environ cinquante carrés miniers situés dans la zone 30. Les données techniques et les titres pourront être documentés ultérieurement.',
            'focus'=>[
                ['Périmètre minier','Présentation des carrés miniers de la zone 30.'],
                ['Développement','Structuration et progression des activités minières.'],
                ['Suivi des projets','Publication future des opérations et étapes validées.'],
            ],
        ],
        'construction' => [
            'mission'=>'Accompagner les projets de construction depuis la compréhension du besoin jusqu’à la coordination des phases de préparation, de réalisation et de suivi.',
            'vision'=>'Promouvoir une approche de la construction fondée sur la clarté du projet, la collaboration des intervenants et une organisation rigoureuse.',
            'audiences'=>[
                ['Maîtres d’ouvrage','Échanges sur les objectifs, contraintes et attentes d’un projet.'],
                ['Investisseurs et promoteurs','Préparation et coordination d’initiatives immobilières ou de construction.'],
                ['Partenaires techniques','Collaboration avec les compétences de conception, de chantier et de contrôle.'],
            ],
            'deliverables'=>[
                ['Note de cadrage','Définition des besoins, du périmètre et des hypothèses du projet.'],
                ['Planning prévisionnel','Organisation indicative des étapes, dépendances et intervenants.'],
                ['Compte rendu de suivi','Documentation des jalons, décisions et points à traiter.'],
            ],
            'faq'=>[
                ['Quels types de projets peuvent être étudiés ?','Les demandes de construction et de développement sont examinées selon leur nature et les compétences mobilisables.'],
                ['Peut-on demander une étude de projet ?','Oui, le contact du groupe permet de présenter les objectifs, la localisation et les contraintes du projet.'],
                ['Où voir les réalisations ?','Les références et photographies de projets seront publiées lorsqu’elles auront été vérifiées et autorisées.'],
            ],
            'intro'=>'De la vision à la réalisation',
            'details'=>'La direction Construction accompagne le développement de projets et leur coordination au sein de l’écosystème COJUKA Consulting Group. Les réalisations, références et capacités opérationnelles seront présentées ici à mesure de leur validation.',
            'services'=>[
                ['Conception et préparation','Cadrage des besoins et organisation des premières étapes.'],
                ['Planification de chantier','Structuration des calendriers, ressources et intervenants.'],
                ['Coordination des travaux','Suivi des échanges entre les parties prenantes du projet.'],
                ['Suivi de projet','Centralisation des étapes, documents et informations.'],
            ],
            'method'=>[
                ['Comprendre','Identifier les objectifs et les contraintes du projet.'],
                ['Concevoir','Structurer une approche adaptée aux besoins.'],
                ['Coordonner','Accompagner les étapes de réalisation et de suivi.'],
            ],
            'video_url'=>null,
            'video'=>'construction.mp4',
            'name'=>'COJUKA Consulting Group Construction',
            'category'=>'Département construction',
            'location'=>'République démocratique du Congo',
            'summary'=>'Direction dédiée à la construction et au développement des projets du groupe.',
            'headline'=>'Bâtir avec vision.',
            'description'=>'La direction Construction représente le pôle de construction et de développement de projets de COJUKA Group. Elle s’inscrit dans la stratégie de développement des activités opérationnelles du groupe.',
            'focus'=>[
                ['Construction','Conception et réalisation de projets.'],
                ['Développement','Organisation des projets de construction.'],
                ['Coordination','Suivi et collaboration avec les autres directions.'],
            ],
        ],
        'logistique' => [
            'mission'=>'Faciliter la préparation et la coordination des flux logistiques nécessaires aux opérations du groupe et aux projets qui lui sont présentés.',
            'vision'=>'Développer une organisation logistique lisible, documentée et capable de coordonner efficacement les acteurs concernés.',
            'audiences'=>[
                ['Entités du groupe','Appui à l’organisation des besoins logistiques transversaux.'],
                ['Partenaires de transport','Coordination des échanges, des contraintes et des calendriers.'],
                ['Porteurs de projets','Analyse préliminaire des besoins de transport et d’acheminement.'],
            ],
            'deliverables'=>[
                ['Plan de coordination','Besoins, intervenants, contraintes et séquence des opérations.'],
                ['Suivi des mouvements','Informations de référence pour documenter les étapes logistiques.'],
                ['Dossier opérationnel','Regroupement des pièces et échanges nécessaires au suivi.'],
            ],
            'faq'=>[
                ['La direction possède-t-elle une flotte de véhicules ?','Aucune capacité de flotte n’est confirmée dans les informations actuellement publiées.'],
                ['Quels besoins peuvent être présentés ?','Les besoins de coordination de transport, de flux et de logistique de projet.'],
                ['Comment demander un accompagnement ?','Précisez l’origine, la destination, les contraintes et le calendrier souhaité via le contact du groupe.'],
            ],
            'intro'=>'Coordonner les flux avec méthode',
            'details'=>'La direction Logistique répond aux besoins de coordination des opérations et des flux. Cette présentation expose ses domaines d’intervention envisagés, sans annoncer de flotte, de capacité de transport ou d’infrastructure non documentée.',
            'services'=>[
                ['Organisation des flux','Préparation et suivi des mouvements logistiques.'],
                ['Coordination transport','Mise en cohérence des besoins, délais et intervenants.'],
                ['Appui aux opérations','Accompagnement logistique des autres activités du groupe.'],
                ['Traçabilité documentaire','Organisation des documents et informations opérationnelles.'],
            ],
            'method'=>[
                ['Planifier','Définir les besoins et les contraintes logistiques.'],
                ['Coordonner','Organiser les échanges entre les intervenants.'],
                ['Suivre','Documenter l’avancement des opérations.'],
            ],
            'video_url'=>'https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161148_798130d0-0d7d-47fa-8c17-b7c076aa9bf3.mp4',
            'video'=>'logistique.mp4',
            'name'=>'COJUKA Consulting Group Logistique',
            'category'=>'Direction logistique',
            'location'=>'République démocratique du Congo',
            'summary'=>'Direction consacrée aux activités de logistique et à la coordination des opérations.',
            'headline'=>'Relier les opérations et les opportunités.',
            'description'=>'La direction Logistique fait partie de la structure opérationnelle de COJUKA Group. Elle accompagne la coordination logistique et les besoins de transport des activités du groupe.',
            'focus'=>[
                ['Coordination','Organisation des flux et des opérations.'],
                ['Transport','Accompagnement des besoins de transport.'],
                ['Synergies','Collaboration avec les autres entités du groupe.'],
            ],
        ],
        'consultance' => [
            'mission'=>'Accompagner les institutions publiques et les organisations privées dans la compréhension de leurs enjeux, la structuration de leurs projets et la définition de trajectoires de transformation.',
            'vision'=>'Faire du conseil un levier de coordination, de performance organisationnelle et de développement des secteurs stratégiques.',
            'audiences'=>[
                ['Institutions étatiques','Cadrage d’initiatives, réflexion organisationnelle et accompagnement institutionnel.'],
                ['Entreprises privées','Analyse de besoins, organisation des processus et développement stratégique.'],
                ['Porteurs de projets','Structuration d’idées, préparation de plans d’action et coordination de partenaires.'],
            ],
            'deliverables'=>[
                ['Diagnostic organisationnel','Synthèse des enjeux, contraintes et opportunités identifiés.'],
                ['Note stratégique','Orientations proposées et scénarios de mise en œuvre.'],
                ['Plan d’action','Étapes, responsabilités, indicateurs et modalités de suivi.'],
            ],
            'faq'=>[
                ['Quelle différence entre consultance étatique et privée ?','La consultance étatique s’adresse aux institutions et organismes publics ; la consultance privée concerne les entreprises et autres acteurs privés.'],
                ['Quels domaines peuvent être accompagnés ?','La structuration de projets, les organisations, les processus et les initiatives de développement stratégique.'],
                ['Comment présenter une mission ?','Décrivez le contexte, les objectifs, les parties prenantes et le calendrier via le contact du groupe.'],
            ],
            'intro'=>'Deux branches, une exigence de conseil',
            'details'=>'La consultance est structurée autour de deux publics : les institutions étatiques et les acteurs privés. Les prestations peuvent concerner le cadrage de projets, la transformation des organisations, la coordination et le développement de secteurs stratégiques.',
            'services'=>[
                ['Consultance étatique','Appui conceptuel et organisationnel aux institutions et organismes publics.'],
                ['Consultance privée','Accompagnement des entreprises et porteurs de projets.'],
                ['Transformation des organisations','Analyse des besoins, structuration et amélioration des processus.'],
                ['Développement stratégique','Réflexion et cadrage d’initiatives sectorielles.'],
            ],
            'method'=>[
                ['Écouter','Comprendre les enjeux et le contexte de l’organisation.'],
                ['Proposer','Définir des orientations et un cadre d’intervention.'],
                ['Accompagner','Soutenir la mise en œuvre et le suivi des actions retenues.'],
            ],
            'video_url'=>'https://d8j0ntlcm91z4.cloudfront.net/user_35sq0uUmKRerZDm8Ty4efx2WQSL/hf_20261015_161147_bbb8b8aa-ee22-4316-b29a-340e357d855c.mp4',
            'video'=>'consultance.mp4',
            'name'=>'COJUKA Consulting Group Consultance',
            'category'=>'Conseil et secteurs stratégiques',
            'location'=>'RDC et international',
            'summary'=>'Consultance étatique et privée, pour les entreprises et les institutions publiques.',
            'headline'=>'Accompagner la transformation.',
            'description'=>'COJUKA Consulting Group propose deux axes de consultance : la consultance étatique, destinée aux institutions et organismes publics, et la consultance privée, destinée aux entreprises et acteurs privés. Ces services accompagnent également le développement de secteurs stratégiques.',
            'focus'=>[
                ['Consultance privée','Conseil et accompagnement des entreprises et initiatives privées.'],
                ['Entreprises','Appui aux organisations et à leurs transformations.'],
                ['Consultance étatique','Conseil aux institutions et organismes publics, et développement des secteurs stratégiques.'],
            ],
        ],
    ];

    public function show(string $slug): View
    {
        abort_unless(array_key_exists($slug, self::PROFILES), 404);
        return view('group-profile', ['profile' => self::PROFILES[$slug]]);
    }
}
