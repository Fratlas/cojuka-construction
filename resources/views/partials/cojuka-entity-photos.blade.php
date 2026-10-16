@php
// Photographies d'illustration sectorielles : elles ne représentent pas nécessairement des réalisations COJUKA.
$cojukaPhotos = [
 'kojuka-mining.mp4'=>[
  ['https://images.unsplash.com/photo-1519003722824-194d4455a60c','Paysage de chantier et engins industriels'],
  ['https://images.unsplash.com/photo-1504307651254-35680f356dfd','Travaux et équipements sur un chantier'],
  ['https://images.unsplash.com/photo-1487958449943-2429e8be8625','Infrastructure et développement territorial'],
 ],
 'eden-park-investments.mp4'=>[
  ['https://images.unsplash.com/photo-1600607687939-ce8a6c25118c','Architecture immobilière contemporaine'],
  ['https://images.unsplash.com/photo-1600596542815-ffad4c1539a9','Résidence contemporaine et patrimoine immobilier'],
  ['https://images.unsplash.com/photo-1487958449943-2429e8be8625','Architecture et investissement foncier'],
 ],
 'impact-center.mp4'=>[
  ['https://images.unsplash.com/photo-1497366811353-6870744d04b2','Espace professionnel contemporain'],
  ['https://images.unsplash.com/photo-1497366754035-f200968a6e72','Environnement de travail et collaboration'],
  ['https://images.unsplash.com/photo-1486406146926-c627a92ad1ab','Bâtiments et activités économiques'],
 ],
 'construction.mp4'=>[
  ['https://images.unsplash.com/photo-1504307651254-35680f356dfd','Chantier de construction et équipements'],
  ['https://images.unsplash.com/photo-1487958449943-2429e8be8625','Projet architectural contemporain'],
  ['https://images.unsplash.com/photo-1600607687939-ce8a6c25118c','Bâtiment et aménagement immobilier'],
 ],
 'logistique.mp4'=>[
  ['https://images.unsplash.com/photo-1494412519320-aa613dfb7738','Transport maritime et conteneurs'],
  ['https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d','Entreposage et organisation logistique'],
  ['https://images.unsplash.com/photo-1504307651254-35680f356dfd','Coordination des moyens opérationnels'],
 ],
 'consultance.mp4'=>[
  ['https://images.unsplash.com/photo-1497366754035-f200968a6e72','Espace de travail collaboratif'],
  ['https://images.unsplash.com/photo-1497366811353-6870744d04b2','Bureaux et environnement professionnel'],
  ['https://images.unsplash.com/photo-1486406146926-c627a92ad1ab','Organisation et développement stratégique'],
 ],
];
$entityPhotos = $cojukaPhotos[$profile['video'] ?? ''] ?? $cojukaPhotos['construction.mp4'];
@endphp