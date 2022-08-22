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
【法人の名称】
【グループホームの電話番号】
【グループホームの住所（市区町村）：都道府県から自治体まで】
【グループホームの住所（番地以降）】
【グループホームのURL：省略可】
```

[CSV](./resources/csv/wam.csv)を編集。一番下にでも1行追加。  
「都道府県コード又は市区町村コード」は都道府県＋なんでもいいので3桁の数字。北海道なら`01000`。後ろの3文字を除いた`01`だけが使われる。

```csv
"都道府県コード又は市区町村コード","NO（※システム内の固有の番号、連番）","指定機関名","法人の名称","法人の名称_かな","法人番号","法人住所（市区町村）","法人住所（番地以降）","法人電話番号","法人FAX番号","法人URL","サービス種別","事業所の名称","事業所の名称_かな","事業所番号","事業所住所（市区町村）","事業所住所（番地以降）","事業所電話番号","事業所FAX番号","事業所URL","事業所緯度","事業所経度","利用可能な時間帯（平日）","利用可能な時間帯（土曜）","利用可能な時間帯（日曜）","利用可能な時間帯（祝日）","定休日","利用可能曜日特記事項（留意事項）","定員"
```

実際に追加するのはこの1行。不要な項目は省略可。

```csv
"01000","","","法人の名称","","","","","","","","","グループホームの名称","","0100000000","北海道〇〇","番地以降","グループホームの電話番号","","グループホームのURL",0,0,"","","","",,,
```

デプロイ後本番環境でインポート。VaporならCommandsで`php artisan gh:import`を実行。

## サーバー
- AWS
- Laravel Vapor https://vapor.laravel.com/
- ドメイン：お名前に移管予定。

## 引継ぎ用
LINE NotifyやGoogle reCAPTCHAのキーは引継ぎ時には取得し直し。
- https://notify-bot.line.me/ja/
- https://www.google.com/recaptcha/

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
./vendor/bin/sail art gh:import
```

## LICENSE
AGPL  
Copyright (c) ポップカルチャースタジオ未来図
