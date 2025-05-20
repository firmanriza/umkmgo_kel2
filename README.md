Command yang Diperlukan:

```bash
composer install
composer require setasign/fpdi
composer require setasign/fpdf

php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan db:seed --class=UserSeeder
php artisan storage:link

php artisan serve

##Jika terjadi error saat menjalankan composer install, gunakan perintah berikut untuk mengatur ulang sumber repositori Packagist:
composer config -g repo.packagist composer https://packagist.org
