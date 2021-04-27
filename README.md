#Installation
1. composer install
2. cp .env.example .env
3. #Configure set database and mailer configurations in .env
4. php artisan key:generate
4. #Open database/seeders/UserTableSeeder.php and enter you email at line 21
5. php artisan migrate:fresh --seed
6. #set up your local hostings or move to step 7
7. php artisan serve 
