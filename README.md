## Royal APP Demo Task, Setup Guide

---


#### Clone Repo

-   git clone https://github.com/veed76/royal_app.git
-   cd royal_app

#### Set ENV varbles

```
API_URL=https://candidate-testing.api.royal-apps.io/api/v2/

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=royal-app
DB_USERNAME=root
DB_PASSWORD=root

```

### install dependencies

-   composer install
-   php artisan migrate
-   php artisan serve


#### Create Author using cli
```
php artisan auther:create
This command will ask the Author details

 Enter author first_name?:
 > Kwame

 Enter author last_name?:
 > Alexander

 Enter author birthday?:
 > 1990-03-20

 Enter author biography?:
 > Times Bestselling author of 32

 Enter author gender?:
 > male

 Enter author place of birth?:
 > UK

OUTPUT

array:7 [
  "id" => 270
  "first_name" => "asd"
  "last_name" => "adsas"
  "birthday" => "2024-03-20T00:00:00+00:00"
  "biography" => "test"
  "gender" => "male"
  "place_of_birth" => "mum"
] 

```