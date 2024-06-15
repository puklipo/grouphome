# グループホームガイド

[![deploy](https://github.com/pop-culture-studio/grouphome/actions/workflows/deploy.yml/badge.svg)](https://github.com/pop-culture-studio/grouphome/actions/workflows/deploy.yml)

https://grouphome.guide/

## 元データ
WAMのオープンデータCSVファイルが基本情報。[CSV](./resources/csv/wam.csv)からインポート。  
変更方法はダウンロードしたCSVファイルを`wam.csv`という名前にしてそのまま上書き。  
https://www.wam.go.jp/content/wamnet/pcpub/top/sfkopendata/

グループホーム事業者やGHガイド管理者はブラウザで直接詳細情報を変更できる。

WAMのCSVファイルは半年ごとの更新。新規グループホームは`wam.csv`を直接編集して追加してもいい。ただしWAMの次回の更新時に上書きされるつもりで追加する。  

### WAM更新前の追加方法
最低限必要な基本情報を送信してもらう。
```
【事業所番号：10桁までの番号】
【グループホームの名称】
【グループホームの名称_かな】
【法人の名称】
【グループホームの電話番号】
【グループホームの住所（市区町村）：都道府県から自治体まで】
【グループホームの住所（番地以降）】
【グループホームのURL：省略可】
```

管理画面から追加。

## サーバー
- AWS
- Laravel Vapor https://vapor.laravel.com/
- ドメイン：お名前に移管。

## 引継ぎ用
LINE NotifyやGoogle reCAPTCHAのキーは引継ぎ時には取得し直し。
- https://notify-bot.line.me/ja/
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
