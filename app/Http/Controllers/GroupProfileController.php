<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GroupProfileController
{
    public const PROFILES = [
        'eden-park-investments' => [
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
            'name'=>'COJUKA Consulting Group Consultance',
            'category'=>'Conseil et secteurs stratégiques',
            'location'=>'RDC et international',
            'summary'=>'Activité de conseil auprès du secteur privé, des entreprises et des institutions étatiques.',
            'headline'=>'Accompagner la transformation.',
            'description'=>'La consultance de COJUKA Group couvre les acteurs privés, les entreprises et les institutions étatiques. Elle vise également l’accompagnement du développement de secteurs stratégiques.',
            'focus'=>[
                ['Secteur privé','Conseil et accompagnement des initiatives privées.'],
                ['Entreprises','Appui aux organisations et à leurs transformations.'],
                ['Institutions','Consultance et développement des secteurs stratégiques.'],
            ],
        ],
    ];

    public function show(string $slug): View
    {
        abort_unless(array_key_exists($slug, self::PROFILES), 404);
        return view('group-profile', ['profile' => self::PROFILES[$slug]]);
    }
}
