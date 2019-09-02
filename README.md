
## TL;DR
```
git clone https://github.com/nikivas/chat.git
cd ./chat/laradock/
docker-compose up -d nginx mysql phpmyadmin workspace
cd ./../laravel/
composer install
php artisan create:db
php artisan migrate:refresh --seed
php artisan dbhost:configure
```

ВНИМАНИЕ!
```
php artisan migrate:refresh --seed
```
Команда приведенная выше заполнит базу несколькими записями, если для ваших тестов база одлжна быть пустая то следует выполнить 
```
php artisan migrate:refresh
``` 

## Установка

Для установки необходимо выполнить следующие шаги:

- выполнить команду "git clone https://github.com/nikivas/chat.git"
- затем перейти в папку "cd ./chat"
- затем необходимо перейти в папку laradock ("cd ./laradock") и загрузить докер " docker-compose up -d nginx mysql phpmyadmin workspace 
"
- затем перейти в папку laravel ( cd "./../laravel/")
- установим пакеты при помощи composer ("composer install")
- затем запустить команду создающую базу в mysql ("php artisan create:db")
- после чего запустить миграции таблиц в базе("php artisan migrate:refresh --seed")
- и под конец мы дружим в настройках .env файла php и mysql