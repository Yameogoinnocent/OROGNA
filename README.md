# OROGNA Consulting — Laravel 13

Version refondue, orientée cabinet premium : identité orange/vert, hero immersif, sections éditoriales, expertises, carrières, formations, contact, candidatures avec CV/lettre et back-office complet.

## Installation

1. PHP 8.3+, Composer, Node.js 20+ et SQLite.
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `php artisan migrate:fresh --seed`
5. `php artisan storage:link`
6. `npm install`
7. `npm run build`
8. `php artisan serve`

Le site public fonctionne aussi avec les styles CDN inclus dans les layouts ; le build Vite reste recommandé pour une mise en production.

## Administration

- URL : `/admin`
- Email : `admin@orogna.com`
- Mot de passe initial : `ChangeMeImmediately123!`

À changer immédiatement en production.

## Fonctionnalités

- Gestion des expertises
- Gestion des offres d'emploi
- Gestion des formations
- Gestion des pages et paramètres du site
- Gestion des messages de contact
- Gestion des candidatures
- Téléchargement sécurisé des CV et lettres
- Candidature spontanée ou liée à une offre
- Responsive mobile / tablette / desktop
- Base SQLite et données de démonstration incluses

## Identité visuelle

Le logo OROGNA fourni a été conservé. Les visuels présents dans `public/images` servent de base et peuvent être remplacés depuis l'administration en modifiant les chemins d'images des contenus.
