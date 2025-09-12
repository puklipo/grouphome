# グループホームガイド

https://grouphome.guide/

## サーバー
- AWS
- Laravel Vapor https://vapor.laravel.com/
- ドメイン：お名前に移管。

## 開発
```shell
git clone ...

composer install
cp .env.example .env
php artisan key:generate

npm install
npm run build

./vendor/bin/sail up -d
./vendor/bin/sail art migrate:fresh --seed
./vendor/bin/sail art gh:import
```

## LICENSE
AGPL  
