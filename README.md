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

### 神奈川
？

### 新潟
https://www.pref.niigata.lg.jp/sec/shougaifukushi/1356826760234.html

### 富山
https://www.pref.toyama.jp/1209/kurashi/kenkou/shougaisha/jigyousha/kj00008459.html

### 石川
https://www.pref.ishikawa.lg.jp/fukusi/jiritsushienfukushi/jigyousyashiteiichiran.html

### 福井
https://www.pref.fukui.lg.jp/doc/shougai/syogaishisetu.html

### 山梨
https://www.pref.yamanashi.jp/shogai-fks/shogai-sisetsu.html

### 長野
https://www.pref.nagano.lg.jp/shogai-shien/kenko/shogai/shogai/joho/jigyosha/ichiranhyo.html

### 岐阜
https://www.pref.gifu.lg.jp/page/26315.html

### 静岡
http://www.pref.shizuoka.jp/kousei/ko-240/kaigo/shougai-shidou/jigyousyo.html

### 愛知
https://www.pref.aichi.jp/soshiki/shogai/30shitei.html

### 三重
https://www.pref.mie.lg.jp/SHOHO/HP/60549032672_00077.htm

### 滋賀
https://www.pref.shiga.lg.jp/ippan/kenkouiryouhukushi/syougaifukushi/303429.html

### 京都
https://www.pref.kyoto.jp/shogaishien/syogaifukushi.html

### 大阪
- https://www.city.osaka.lg.jp/fukushi/page/0000257854.html



### 福岡
1行目を削除（`一覧情報は毎月更新しています。情報を利用する場合は必ず最新の情報をご確認ください。`を削除）して2行目をヘッダーに。
- https://www.pref.fukuoka.lg.jp/contents/shougaishashiteijigyousyo.html
