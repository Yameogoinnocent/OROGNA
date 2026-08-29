# Installation Windows / Laragon

Depuis le dossier du projet :

```powershell
composer install
if (!(Test-Path .env)) { Copy-Item .env.example .env }
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
npm install
npm run build
php artisan optimize:clear
php artisan serve --port=8001
```

Si `composer install` a déjà échoué pendant `package:discover`, relance simplement :

```powershell
composer dump-autoload
php artisan optimize:clear
```

Puis :

```powershell
php artisan migrate:fresh --seed
npm install
npm run build
php artisan serve --port=8001
```


## Répondre aux messages depuis le tableau de bord

La rubrique **Messages** permet maintenant de répondre directement à une personne qui a écrit depuis la page Contact. La réponse est envoyée par email et conservée dans l’historique.

En local, le projet utilise `MAIL_MAILER=log` par défaut : Laravel enregistre alors les emails dans `storage/logs/laravel.log` au lieu de les expédier réellement. Pour un site en production, renseignez les paramètres SMTP de votre hébergeur dans `.env`, par exemple :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.votre-hebergeur.com
MAIL_PORT=587
MAIL_USERNAME=contact@votre-domaine.com
MAIL_PASSWORD=VOTRE_MOT_DE_PASSE
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contact@votre-domaine.com
MAIL_FROM_NAME="OROGNA Consulting"
```

Puis lancez `php artisan optimize:clear`. Les identifiants SMTP ne doivent pas être intégrés dans le code ni dans le tableau de bord.
