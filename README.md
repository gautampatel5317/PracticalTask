

# Information of Task

- Task is created in laravel framework with version of ^8.40 and database with mysql. 
- We grab the data from https://openweathermap.org/ for current weather data .
- I have used one of the OpenWeatherMap APIs, Such as find cities in circle weather informaition whose URL is api.openweathermap.org/data/2.5/find?lat={lat}&lon={lon}&cnt={cnt}&appid={API key}.
- User can search the city wise or date-time wise and get the results of weather information and then export the data in csv click on CSV button .


## Steps For Fetching data from API
- I have created one cron job for getting data in background to fetch whether data efficiently .
- Fetching the data using Http::get(URL) methods .
- This data stored in local database .
- The scheduler command is : php artisan weather:cron.


## Setup

Clone the repo and follow below steps.
Once you have created a new Laravel application, you may install Laravel Breeze using Composer:
composer require laravel/breeze --dev .

1. Run `composer install`
2. Copy `.env.example` to `.env` Example for linux users : `cp .env.example .env`
3. Set valid database credentials of env variables `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
4. Run `php artisan key:generate` to generate application key
5. php artisan breeze:install
6. Run `php artisan migrate`
7. Run `npm i` (Recommended node version `>= V10.0`)
8. Run `npm run dev` or `npm run prod` as per your environment

Thats it... Run the command `php artisan serve` and register then login the system .


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
