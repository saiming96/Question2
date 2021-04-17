# laravel-currency-converter
![screenshots of example app](/screenshot1.jpg)

## Get currency rate for a current code against USD
A simple laravel project to get the currency rate for a currency code (e.g. MYR) against USD using Livewire and TailwindCSS.

## Requirements
- [Laravel] -7.0 or higher
- [PHP] - 7.4 or higher
- [mysql] - 5.7.24 or higher
- [node.js] - 12.13.0 or higher

## Installation
Step 1: Clone or download the project
```sh
# To clone the project clone the project
git clone https://github.com/saiming96/laravel-currency-converter.git
```

Step 2: 
Rename '.env.example' to '.env' or Create '.env' file and copy the code from '.env.example' to '.env'

Step 3:
Get Free Currency Convertor API Key From `https://free.currencyconverterapi.com/`

Step 4:
Edit '.env' file change 
* APP_URL  - APP URL 
* CURRENCY_CONVERTER_API_KEY - Free Currency Convertor API Key
* Database Connection
    * DB_CONNECTION
    * DB_HOST
    * DB_PORT
    * DB_DATABASE
    * DB_USERNAME
    * DB_PASSWORD

Step 5:
```sh
cd laravel-currency-converter
composer install
npm install
npm run dev
php artisan config:clear
php artisan key:generate
php artisan migrate
```

> Note: Please make sure `APP_URL` is set correctly if the system do not run as expected.

> Note: Please run `php artisan config:clear` after edited .env file 
