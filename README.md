> ### Spin Request CRUD.

# Getting started

## Installation

Clone the repository

    git clone https://github.com/quitenoisemaker/spin_request_task_management.git

Switch to the repo folder

    cd spin_request_task_management

Install all the dependencies using composer

    composer install

Copy the .env.example file and rename it to .env. Then make the neccessary changes

    Example:   
                DB_DATABASE=YOUR-DATABASE_NAME
                DB_USERNAME=YOUR_DATABASE-USERNAME
                DB_PASSWORD=YOUR_DATABASE-PASSWORD

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Rund Seeder

    php artisan db:seed

Start the local development server

    php artisan serve

## Test
    php artisan test

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Http/Requests` - Contains all the api form requests
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `routes/api` - Contains all the api routes


