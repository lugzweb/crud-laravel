Example Project

Installation steps:

1) git clone https://github.com/lugzweb/example-code.git %folder_name%

2) cd %folder_name%

3) composer install

4) configure .env:

CACHE_DRIVER=redis

DB_DATABASE=***

DB_USERNAME=***

DB_PASSWORD=***

5)Run:

php artisan migrate

php artisan db:seed

(seed may take some time, because of inserting 10 millions rows)

6)Login with admin credentials

email:    lugzweb@gmail.com

password: 123456789

 Enjoy

*You can use install-project.sh with your Homstead box. Put install-project.sh to Homestead/scripts folder beforfe vagrant runs 
