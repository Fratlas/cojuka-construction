# COJUKA Consulting Group — charte web et communication (octobre 2026)

## Identité & direction artistique
- **Logo officiel :** conserver l'emblème rouge, le globe et l'Afrique avec leur rendu d'origine. Ne pas redessiner, recolorer ni déformer le fichier. Les textes intégrés au logo ne doivent pas être doublés par un autre mot-symbole sans demande.
- **Rouge bordeaux** `#86212E` : accents, actions principales, repères et titres.
- **Or** `#B88A55` : signalétique premium, soulignements et accents.
- **Bleu nuit** `#151B28` : fonds immersifs, communication institutionnelle.
- **Ivoire** `#F6F7F9` : fonds lumineux, mise en valeur des surfaces vitrées.
- **Typographie :** système sans-sérif, titres très gras (800–900), contrastes hiérarchiques lisibles.
- **Photographie :** secteurs Mining, construction, logistique, immobilier, conseil et coopération ; légendes honnêtes. Ne pas présenter les banques d'images comme des réalisations de COJUKA.
- **Glassmorphism :** opacité légère, flou modéré, verre multicouche. Sur les photos, garder suffisamment de contraste pour les titres et les CTA.
- **Animation :** transitions fluides, pause au survol/toucher, réduction des animations selon le système.

## Photographie & infographies
- `resources/views/partials/cojuka-photo-marquee.blade.php` : dix images distinctes, défilement automatique de droite à gauche, sans éléments clonés. Sur mobile, on peut glisser manuellement ; pause au survol et pendant l'interaction.
- `resources/views/partials/cojuka-strategy-infographic.blade.php` : six pôles illustrés, méthode en quatre étapes et palette de marque. La roue sert d'illustration thématique et **ne représente aucune proportion financière ou opérationnelle**.
- `public/css/cojuka-editorial.css` : réglages des titres, cartes, galerie, newsletter et nuances des modes clair/sombre.

## Newsletter
La newsletter comprend :
1. Formulaire public dans le footer sur toutes les pages, avec accord explicite.
2. Enregistrement en MySQL, statut *en attente*.
3. Courriel contenant un lien de confirmation signé et limité à 48 heures.
4. Confirmation du consentement.
5. Lien permanent de désinscription signé.
6. Tableau privé : `Gestion > Newsletter`, visible uniquement aux administrateurs. Export CSV des **adresses confirmées seulement**.

Une campagne e-mail automatique n'est **pas** installée : l'export des abonnés confirmés peut servir à une plateforme d'envoi conforme à la politique de confidentialité. Chaque campagne doit contenir un lien de désinscription.

### Activation en production
Sauvegarder la base puis appliquer la migration :
```bash
php artisan migrate --force
php artisan optimize:clear
```
Configurer l'expéditeur et un transport SMTP réel, au moyen des paramètres `MAIL_*` de `.env`. Sans transport SMTP, la soumission est enregistrée en attente et l'interface signale que le courriel n'a pas été envoyé. **Tester la confirmation et la désinscription avec une adresse de contrôle.**

Le stockage des e-mails et des dates de consentement est limité à la newsletter. Protéger les sauvegardes, respecter les demandes de retrait et définir une durée de conservation adaptée.

## Réseaux sociaux
Le footer affiche des icônes de **partage** Facebook, LinkedIn, WhatsApp et X (liens publics fonctionnels). Les comptes **officiels** sont volontairement masqués tant que leurs liens HTTPS ne sont pas renseignés dans les variables `COJUKA_FACEBOOK_URL`, `COJUKA_INSTAGRAM_URL`, `COJUKA_LINKEDIN_URL`, `COJUKA_YOUTUBE_URL`, `COJUKA_TIKTOK_URL`.
Après mise à jour de `.env`, vider le cache de configuration : `php artisan optimize:clear`.

## Checklist qualité
- Vérifier le site sur mobile et ordinateur en modes clair/sombre.
- Vérifier le chargement de chaque photo et les liens vers les pages de structures.
- Vérifier le défilement automatique et la possibilité de faire glisser la galerie.
- Contrôler le contraste des textes sur les vidéos et sur le panneau sombre de la newsletter.
- Exécuter le scénario d'inscription, confirmation et désinscription newsletter.
- Confirmer que les comptes sociaux montrés correspondent à des comptes réellement officiels.
