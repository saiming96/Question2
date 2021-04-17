# Question2
## Get currency rate for a current code against USD
A simple laravel project to get the currency rate for a currency code (e.g. MYR) against USD.

## Requirements
- [Laravel] -7.0 or higher
- [PHP] - 7.4 or higher
- [mysql] - 5.7.24 or higher
- [node.js] - 12.13.0 or higher

## Installation
Step 1: Clone or download the project

Step 2: 
Rename '.env.example' to '.env' or Create '.env' file and copy the code from '.env.example' to '.env'

Step 3:
Edit '.env' file change APP_URL & Database Connection

Step 4:
```sh
cd Question2
composer install
npm install
npm run dev
php artisan key:generate
php artisan migrate
```

> Note: Please make sure `APP_URL` is set correctly if the system do not run as expected.
