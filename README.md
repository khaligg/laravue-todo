# Laravel + Vue ToDoList App

# Laravel REST Api Setup commands:

composer install

copy .env.example .env

php artisan key:generate

php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

php artisan jwt:secret

php artisan migrate

php artisan db:seed --class=UsersTableSeeder

php artisan serve

# Vue Client App Setup commands

npm install

npm run serve
