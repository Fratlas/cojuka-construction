# Espace privé COJUKA

L'interface est accessible via `/gestion`, derrière le middleware Laravel `auth`.

**Important :** cette livraison est uniquement la vue de gestion. L'authentification (login, logout), les utilisateurs, les rôles et les autorisations doivent être implémentés et testés avant mise en production. La route `logout` utilisée par la vue nécessite une route POST nommée `logout`.

Ne retirez pas le middleware `auth` pour tester l'interface sur un serveur public.

Modules prévus : projets, chantiers, employés, documents, finances, paramètres. Les chiffres sont volontairement non renseignés pour éviter de simuler des données réelles.

## Étapes suivantes
1. Créer la table users et les migrations Laravel requises.
2. Ajouter une authentification Laravel sécurisée, avec limitations de tentatives et renouvellement de session.
3. Ajouter des rôles (administrateur, responsable, employé) et des policies pour chaque module.
4. Vérifier côté serveur les permissions d'accès aux documents et aux données financières.
5. Enregistrer les opérations sensibles dans un journal d'audit.
6. Configurer HTTPS, cookies sécurisés et sauvegardes sur Hostinger.
