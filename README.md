
## TL;DR
```
git clone https://github.com/nikivas/chat.git
cd ./chat/laradock/
docker-compose up -d nginx mysql phpmyadmin redis workspace
cd ./../laravel/
php artisan create:db
php artisan migrate:refresh
php artisan dbhost:configure
```

## Установка

Для установки необходимо выполнить следующие шаги:

- выполнить команду "git clone https://github.com/nikivas/chat.git"
- затем перейти в папку "cd ./chat"
- затем необходимо перейти в папку laradock ("cd ./laradock") и загрузить докер " docker-compose up -d nginx mysql phpmyadmin redis workspace 
"
- затем перейти в папку laravel ( cd "./../laravel/")
- затем запустить команду создающую базу в mysql ("php artisan create:db")
- после чего запустить миграции таблиц в базе("php artisan migrate:refresh")
- и под конец мы дружим в настройках .env файла php и mysql