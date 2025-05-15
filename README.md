command yang diperlukan:

composer install
composer require setasign/fpdi
composer require setasign/fpdf

php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan db:seed --class=UserSeeder
php artisan storage:link

php artisan serve

Notes: jika saat install composer error gunakan
composer config -g repo.packagist composer https://packagist.org 
