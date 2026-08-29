# OROGNA Consulting — V8 Premium

Version renforcée pour 2026 : accueil plus éditorial, images dynamiques, zone vidéo, et administration sans code.

## Installation Windows
1. `composer install`
2. Vérifier `.env` et la base SQLite/MySQL.
3. `php artisan migrate`
4. `php artisan optimize:clear`
5. `php artisan serve --port=8001`

## Gestion des images
Depuis **Administration → Page d’accueil**, vous pouvez envoyer les images du hero, de la vidéo, de la section impact, de la section À propos et du CTA.
Les expertises, formations et pages permettent aussi d’envoyer/remplacer leur image. Formats : JPG, PNG, WebP, 12 Mo maximum.

Les fichiers sont stockés dans `public/uploads/`.
