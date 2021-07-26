## How to run

#### Cloning the project
```shell
git clone -b adminlte https://github.com/gustavors22/help-desk-ticket.git 
cd help-desk-ticket
```
#### Running the project
```shell
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```