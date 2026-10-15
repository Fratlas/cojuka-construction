<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GroupProfileController
{
    public const PROFILES = [
        'eden-park-investments' => [
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
