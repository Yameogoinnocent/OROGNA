# OROGNA Consulting — V7

Cette version applique la nouvelle direction visuelle OROGNA et ajoute la photo d'équipe fournie.

## Nouveautés

- Photo d'équipe OROGNA utilisée en arrière-plan du hero et dans la section À propos.
- Bloc vidéo premium dans le hero.
- Vidéo administrable depuis **Administration → Page d'accueil**.
- URL vidéo compatible avec MP4, YouTube (watch / youtu.be / embed) et Vimeo.
- Bouton unique **Connexion** dans le header avec menu pour se connecter ou créer un compte.
- Connexion et inscription réunies sur une seule page `/login`.
- `/register` conserve sa route Laravel mais affiche la même page unifiée.
- Espace candidat avec candidatures et messagerie.
- Administration → **Comptes & connexions** pour voir les comptes et activer/désactiver leurs accès.
- Page d'accueil plus immersive, structurée et orientée conversion.

## Installation

```powershell
composer install
php artisan migrate
php artisan optimize:clear
php artisan serve --port=8001
```

Si tu utilises la base SQLite déjà fournie, fais seulement `php artisan migrate` pour conserver les données.

Pour les assets déjà présents, aucune compilation npm n'est nécessaire pour tester cette version : les styles principaux sont déjà présents dans `public/css/orogna.css`.

## Vidéo

Dans **Administration → Page d'accueil → Photo & vidéo du hero**, renseigner :

- une URL MP4 ; ou
- une URL YouTube ; ou
- une URL Vimeo.

Laisser le champ vide pour garder le visuel de présentation.

## Compte administrateur de démonstration

Le seeder du projet crée / met à jour :

- Email : `admin@orogna.com`
- Mot de passe : `ChangeMeImmediately123!`

À changer immédiatement sur un vrai serveur.
