# グループホームガイド

[![deploy](https://github.com/pop-culture-studio/grouphome/actions/workflows/deploy.yml/badge.svg)](https://github.com/pop-culture-studio/grouphome/actions/workflows/deploy.yml)

https://grouphome.guide/

## 元データ
WAMのオープンデータCSVファイルが基本情報。[CSV](./storage/wam.csv)からインポート。  
変更方法はダウンロードしたCSVファイルを`wam.csv`という名前にしてそのまま上書き。  
https://www.wam.go.jp/content/wamnet/pcpub/top/sfkopendata/

グループホーム事業者やGHガイド管理者はブラウザで直接詳細情報を変更できる。

WAMのCSVファイルは半年ごとの更新。新規グループホームは`wam.csv`を直接編集して追加してもいい。ただしWAMの次回の更新時に上書きされるつもりで追加する。  
WAMに全グループホームの情報が載ってるとは限らない。事業者はWAMや自治体に届出を出してください。

## サーバー
- AWS
- Laravel Vapor https://vapor.laravel.com/

## 開発
```shell
git clone ...

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

./vendor/bin/sail up -d

cp .env.example .env
./vendor/bin/sail art key:generate

./vendor/bin/sail art migrate:fresh --seed
./vendor/bin/sail art import
```

## LICENSE
AGPL  
Copyright (c) ポップカルチャースタジオ未来図
