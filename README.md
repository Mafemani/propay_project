

Running Laravel Project
This guide will walk you through the steps required to run a Laravel project on your local machine.

Prerequisites
Before you begin, ensure that you have the following installed:

PHP (7.x or higher)
Composer
MySQL
Laravel Framework 11.0.6 (or higher)
npm (for managing frontend assets if applicable)
- npm install


php artisan migrate
php artisan db:seed

Serve the Application:
You can use Laravel's built-in server for development:
- php artisan serve

Compile Frontend Assets (if applicable):
If your project uses npm for frontend assets, you may need to compile them:
-npm run dev

php artisan config:cache
php artisan route:cache
php artisan view:cache

Please note that .env it is included in the Repo with the correct configuration (This is not a best practice)
To simplify the set-up process. This file will later be removed




