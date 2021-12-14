# グループホーム

## 開発
```
git clone
composer install
cp .env.example .env
php artisan key:generate

sail up -d
sail art migrate:fresh --seed
sail art import:csv
```


## Excelファイル
グループホームの一覧情報は各都道府県サイトのExcelファイルで取得できる。[障害福祉サービス等情報検索](https://www.wam.go.jp/sfkohyoout/) からも取得できるけどグループホームはExcelファイルからの方が良さそう。

Excelファイルを読み込みやすいように加工してCSVファイルで出力。加工する方法はExcelでもGoogleスプレッドシートでもいい。実際に読み込むのはCSVファイル。

運用段階では[resources/csv/](./resources/csv/)のcsvファイルに直接プルリクでもいい。

### 北海道
- https://www.pref.hokkaido.lg.jp/hf/shf/jigyousyosisetuichiran.html

### 青森
- https://www.pref.aomori.lg.jp/soshiki/kenko/syofuku/syougai_jigyousya_ichiran.html

### 岩手
- https://www.pref.iwate.jp/kurashikankyou/fukushi/shougai/jigyousha/1004057/1004058.html

### 宮城
- https://www.pref.miyagi.jp/site/syoufuku-top/ksb22.html

### 秋田
- https://www.pref.akita.lg.jp/pages/archive/18864

### 山形
不明

### 福島
https://www.pref.fukushima.lg.jp/sec/21035c/jigyousyojouhou.html

### 茨城
https://www.pref.ibaraki.jp/hokenfukushi/shofuku/seishin/shofuku/c/c-6.html

### 栃木
https://www.pref.tochigi.lg.jp/e05/welfare/shougaisha/fukushi/shogai_jigyosha.html

### 群馬
https://www.pref.gunma.jp/02/d4200334.html

### 埼玉
https://www.pref.saitama.lg.jp/a0605/s107/index.html

### 千葉
https://www.pref.chiba.lg.jp/kenshidou/fukushishisetsu/mokuji.html

### 東京
「共同生活援助」以外を削除。1行目を削除。「事業所－住所」のセルの結合を解除して「事業所－地域」と「事業所－住所」に分割。
- https://www.shougaifukushi.metro.tokyo.lg.jp/Lib/LibDspList.php?catid=100-001

### 大阪
- https://www.city.osaka.lg.jp/fukushi/page/0000257854.html

### 福岡
1行目を削除（`一覧情報は毎月更新しています。情報を利用する場合は必ず最新の情報をご確認ください。`を削除）して2行目をヘッダーに。
- https://www.pref.fukuoka.lg.jp/contents/shougaishashiteijigyousyo.html
