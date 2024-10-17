# グループホームガイド

[![deploy](https://github.com/pop-culture-studio/grouphome/actions/workflows/deploy.yml/badge.svg)](https://github.com/pop-culture-studio/grouphome/actions/workflows/deploy.yml)

https://grouphome.guide/

## サーバー
- AWS
- Laravel Vapor https://vapor.laravel.com/
- ドメイン：お名前に移管。

## 引継ぎ用
LINE NotifyやGoogle reCAPTCHAのキーは引継ぎ時には取得し直し。

- https://www.google.com/recaptcha/

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
Copyright (c) ポップカルチャースタジオ未来図
