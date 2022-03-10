First run **composer install --ignore-platform-reqs** to install all composer packages

create a **.env** file and copy everything from .env.example

change the database name in **.env** file to test

***example:: DB_DATABASE=test***

Create a databse named 'test'

Then run ***php artisan migrate:fresh --seed*** for existng product data

