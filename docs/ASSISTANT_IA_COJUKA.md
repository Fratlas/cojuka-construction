# COJUKA — Assistant IA : installation et vérification

## Correction du 4 novembre 2026

Le script de `resources/views/partials/cojuka-ai-assistant.blade.php` contenait un fragment dupliqué hors fonction JavaScript (`await`, `return false` et `finally` à un emplacement invalide). Le navigateur arrêtait tout le premier script avant l’enregistrement des événements d’ouverture, de fermeture, de chat, de microphone et de guides. Le fragment a été retiré et les deux scripts ont été soumis à un contrôle de syntaxe.

Le panneau reste fixé en bas à droite, s’adapte aux petits écrans et peut être fermé par X, Échap ou un clic extérieur. Il affiche les tutoriels et les réponses. Les fonctions vocales dépendent des autorisations du navigateur et, pour l’appel temps réel, du service API configuré.

## Fonctionnement avec ou sans clé API

- **Sans clé API** : le contrôleur répond désormais par des **messages de guidage spécifiques à COJUKA** (Mining, Histoire, Construction, Logistique, connexion et gestion). Pas d’appel à un modèle externe.
- **Avec clé API** : il peut appeler le fournisseur OpenAI via le serveur Laravel pour fournir des réponses conversationnelles supplémentaires. Aucune clé ne doit être exposée dans le HTML ou dans JavaScript.
- **Appel vocal direct** : nécessite HTTPS, permission microphone, API et modèle temps réel disponibles, ainsi qu’un serveur compatible avec les appels Realtime. La synthèse et la reconnaissance vocale du navigateur sont distinctes.

### Configuration serveur

Dans le vrai fichier `.env` du serveur (jamais dans GitHub), renseigner si souhaité :

```dotenv
OPENAI_API_KEY=VOTRE_CLE_PRIVEE
OPENAI_MODEL=gpt-4o-mini
OPENAI_REALTIME_MODEL=gpt-realtime-mini
```

Les réglages sont lus via `config/cojuka.php`, y compris lorsque la configuration Laravel est mise en cache. Conservez le modèle supporté par votre compte API et vérifiez la facturation.

Après déploiement :

```bash
php artisan config:clear
php artisan view:clear
php artisan optimize:clear
php artisan config:cache
```

### Tests recommandés

1. Ouvrir `https://cojuka.com` en navigateur normal puis cliquer sur « Assistant IA ».
2. Vérifier la fenêtre, les tutoriels, le champ de question et la fermeture par X, Échap et clic à l’extérieur.
3. Envoyer « Bonjour », « Présente-moi Mining », « Histoire et Belgique » puis « Comment accéder à Gestion ? ». Il doit y avoir une **réponse**, même si la clé API est absente.
4. Tester Android (Chrome), iPhone (Safari), ordinateur (Chrome / Edge), le mode sombre et le mode clair.
5. Tester après connexion à Gestion. Les liens proposés doivent respecter les droits des départements et ne jamais montrer les données privées.
6. Si un appel IA n’aboutit pas, regarder les réponses HTTP de `POST /assistant/reponse` : **419** = session CSRF, **429** = limitation de requêtes, **5xx** = erreur serveur. Le bouton Envoyer se réactive après un délai maximal côté navigateur.
7. Pour la voix, vérifier HTTPS, politique microphone, permissions navigateur et API en production. Sans configuration vocale, le chat écrit doit rester fonctionnel.

### Sécurité et limites

L’assistant est informatif. Il ne modifie pas la base, ne consulte pas de dossiers RH/financiers individuels et ne permet pas de contourner les permissions. Ne pas donner de mot de passe ou de données confidentielles dans ses messages. Ne jamais placer `OPENAI_API_KEY` dans un fichier front-end.

La validation actuellement effectuée est **statique** (structure des fichiers, syntaxe JavaScript, contrôle de la route et de la configuration). Une vérification réseau complète sur le serveur déployé et ses journaux reste nécessaire avant d’affirmer que le service OpenAI est opérationnel.
