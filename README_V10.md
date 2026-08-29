# OROGNA Consulting V10 — Administration Premium 2026

## Nouveautés
- Back-office professionnel avec sidebar fixe, navigation espacée, KPI, pipeline, activité et actions rapides.
- Navigation publique compacte : Connexion et Déposer mon CV sont plus discrets et mieux proportionnés.
- Nouvelle rubrique publique Galerie.
- Gestion d’albums depuis Administration → Galerie photos : créer, publier, définir une couverture, ajouter plusieurs photos et retirer des images.
- La médiathèque générale reste disponible.
- Les images des expertises utilisent désormais les ressources présentes dans `public/images/services`.

## Installation Windows / Laragon
```powershell
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan optimize:clear
php artisan serve --host=127.0.0.1 --port=8001
```

Pour une installation totalement neuve :
```powershell
php artisan migrate:fresh --seed
```

Compte administrateur créé par le seeder :
- Email : `admin@orogna.com`
- Mot de passe initial : `ChangeMeImmediately123!`

Changez immédiatement ce mot de passe après la première connexion.

## URLs
- Site : `http://127.0.0.1:8001`
- Galerie : `http://127.0.0.1:8001/galerie`
- Administration : `http://127.0.0.1:8001/admin`
- Gestion galerie : `http://127.0.0.1:8001/admin/galerie`

## Important
Ne faites pas `migrate:fresh` sur une installation contenant des données à conserver.
Les images envoyées dans les albums sont stockées dans `public/uploads/gallery`.
