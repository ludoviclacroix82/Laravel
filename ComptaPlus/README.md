# ComptaPlus

## Description du Projet

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


## Auteur

Créé par Ludovic - [Https://github.com/ludoviclacroix82](Https://github.com/ludoviclacroix82).



