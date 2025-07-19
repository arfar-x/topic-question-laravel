# Topic-Question

First of firsts, install Composer packages:
```bash
composer install
```
After installing the packages, we should implement database schemas via Laravel migrations:
```bash
php artisan migrate
```
Then, to show sample data we should run database seeders:
```bash
php artisan db:seed
```

## API requests

Get topic list

```bash
curl --location 'localhost:8000/api/topic' --header 'Accept: application/json'
```

Get a single topic
```bash
curl --location 'localhost:8000/api/topic/1' --header 'Accept: application/json'
```

Get questions
```bash
curl --location 'localhost:8000/api/topic/1/questions?per_page=3&page=1' --header 'Accept: application/json'
```
