# Laravel 10 Job Portal

laravel 10 Job Portal with Docker, MySQL, Bootstrap 5 and jquery.

## Demo

    comming soon

## Installation with docker

1.Clone the project

    git clone https://github.com/Moyhe/job_portal.git

2.Run composer install

Navigate into project folder using terminal and run

    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

3.Copy .env.example into .env

    cp .env.example .env

4.Start the project in detached mode

    ./vendor/bin/sail up -d

From now on whenever you want to run artisan command you should do this from the container.
Access to the docker container

    ./vendor/bin/sail bash

5.Set encryption key

    php artisan key:generate --ansi

6.Run migrations

    php artisan migrate

7.to activate Mail sending to seeker applicant run

    php artisan queue:work

## Features

1. Admin Dashboard for premium(employer) user
2. register and login for seeker and employer user
3. appling for a job for seeker user
4. company profile page
5. profile page for each seeker and employer user
6. home page for displaying and filtering jobs
7. payment gateway using stripe for employer user
