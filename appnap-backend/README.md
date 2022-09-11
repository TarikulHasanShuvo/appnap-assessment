

## Installation

### Clone the repository

    git clone https://github.com/TarikulHasanShuvo/appnap-assessment.git

### Switch to the repo folder

    cd appnap-backend

### Install all the dependencies using composer

    composer install

### Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

### Database configuration

    DB_DATABASE=your_database_name
    DB_USERNAME=your_user_name
    DB_PASSWORD=your_password

### Generate a new application key, storage link create & Install Passport

    php artisan key:generate
    php artisan storage:link
    php artisan passport:install

### Create table & dummy data from seeder

    php artisan migrate --seed

### Start the local development server

    php artisan serve

### Credentials

    User Panel 
    ======
    Email: admin@gmail.com 
    Password - 1234678
 
