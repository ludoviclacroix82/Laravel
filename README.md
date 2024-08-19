# Laravel

# README

## Description du Projet

Ce dépôt contient une série d'exercices visant à maîtriser le framework **Laravel**. Chaque exercice explore des fonctionnalités spécifiques de Laravel, permettant ainsi une compréhension progressive et approfondie du framework.

### Exercice 1: Restaurant

L'exercice **Restaurant** est le tout premier de cette série et sert d'introduction à Laravel. Cet exercice se concentre sur la mise en place d'un système basique de gestion des restaurants en utilisant un modèle simple de **CRUD** (Create, Read, Update, Delete).

#### Fonctionnalités :
- Création, modification et suppression de restaurants.
- Affichage de la liste des restaurants.
- Utilisation d'un modèle basique de **V-RUD** (Visualisation, Recherche, Update, Delete).

### Exercice 2: Compa Plus

L'exercice **Compa Plus** est un exercice plus approfondi qui introduit des concepts avancés de Laravel. Il reprend les bases de l'exercice précédent tout en ajoutant de nouvelles fonctionnalités pour une meilleure maîtrise du framework.

#### Fonctionnalités :
- **CRUD** complet : gestion des données avec des formulaires de création, modification, et suppression.
- **Zone de profil** : chaque utilisateur peut gérer son propre profil.
- **Zone d'administration** : les administrateurs disposent d'une interface dédiée pour gérer les utilisateurs et les permissions.
- **Authentification** : mise en place d'un système d'inscription, de connexion et de gestion des sessions via les fonctionnalités natives de Laravel.
- **Politiques de permission** : utilisation des **Policies** de Laravel pour gérer les permissions d'accès aux différentes fonctionnalités en fonction des rôles des utilisateurs.
- **Livewire** : intégration de **Livewire** pour des interactions plus dynamiques et réactives, facilitant la gestion des événements côté client sans nécessiter de JavaScript complexe.
- **Sécurité** : renforcement de la sécurité des opérations critiques avec des validations supplémentaires et des protections contre les attaques courantes.

## Installation

1. **Cloner le dépôt** :
    ```bash
    git clone depot
    cd nom-du-repo
    ```

2. **Installer les dépendances** :
    ```bash
    composer install
    npm install
    ```

3. **Configurer l'environnement** :
    - Copier le fichier `.env.example` en `.env`.
    - Configurer les paramètres de connexion à la base de données et autres variables d'environnement.

4. **Générer la clé d'application** :
    ```bash
    php artisan key:generate
    ```

5. **Exécuter les migrations et seeder la base de données** :
    ```bash
    php artisan migrate --seed
    ```

6. **Lancer le serveur de développement** :
    ```bash
    php artisan serve
    npm run dev
    ```

## Contributions

Les contributions sont les bienvenues ! N'hésitez pas à proposer des améliorations ou à signaler des bugs en ouvrant une issue ou en soumettant une pull request.

## Auteur

Créé par [Votre Nom] - [Votre Email].

## License

Ce projet est sous licence MIT. Veuillez consulter le fichier LICENSE pour plus de détails. 

---

Ce README est destiné à être modifié au fur et à mesure que de nouvelles fonctionnalités sont ajoutées ou que des changements sont apportés au projet.
