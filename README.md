# laravel-vue-crud
Crud laravel + vue js with api and template vuetify component
# Getting started

## Installation

Clone the repository

    git clone https://github.com/tarunvaghela33/laravel-vue-crud.git

Switch to the repo folder

    cd laravel-vue-crud

Install all the dependencies using composer

    composer install

Install all the dependencies using npm

    npm install
    npm run dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/tarunvaghela33/laravel-vue-crud.git
    cd laravel-vue-crud
    composer install
    npm install
    npm run dev
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve





