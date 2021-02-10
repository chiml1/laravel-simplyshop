PHP Laravel Online Shop App with Laratrust
Panel for user and admin
Initial data is in initial.txt file 

Skip or change database name in .env file

go to the project directory in terminal

composer require santigarcor/laratrust
php artisan vendor:publish --tag="laratrust"
php artisan config:clear
composer dump-autoload
php artisan vendor:publish --tag="laratrust-seeder"
composer dump-autoload
php artisan migrate
php artisan db:seed

php artisan serve
