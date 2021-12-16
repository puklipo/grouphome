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
？  

https://www.city.yamagata-yamagata.lg.jp/kenkofukushi/syougaisha/1008376/1004625.html

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
https://www.rakuraku.or.jp/shienhi/

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
？

名古屋市はここから検索後CSVでダウンロード可能。  
https://www.kaigo-wel.city.nagoya.jp/view/wel/jigyosho/

### 三重
https://www.pref.mie.lg.jp/SHOHO/HP/60549032672_00077.htm

### 滋賀
https://www.pref.shiga.lg.jp/ippan/kenkouiryouhukushi/syougaifukushi/303429.html

### 京都
https://www.pref.kyoto.jp/shogaishien/syogaifukushi.html

### 大阪
https://www.pref.osaka.lg.jp/chiikiseikatsu/syougaijisien/itiran.html

### 兵庫
https://web.pref.hyogo.lg.jp/kf08/hw19_000000221.html

### 奈良
https://www.pref.nara.jp/52403.htm

### 和歌山
https://www.pref.wakayama.lg.jp/prefg/040100/shisetsu/index.html

### 鳥取
？  
https://www.pref.tottori.lg.jp/254597.htm

### 島根
https://www.pref.shimane.lg.jp/medical/fukushi/syougai/ichiran/

### 岡山
https://www.pref.okayama.jp/page/639934.html

### 広島
https://www.pref.hiroshima.lg.jp/soshiki/62/shiteikokuji.html

### 山口
https://www.pref.yamaguchi.lg.jp/cms/a14100/jiritsu00/jyohokohyo3006.html

### 徳島
https://ouropendata.jp/dataset/1719.html

### 香川
https://www.pref.kagawa.lg.jp/shogaifukushi/shisetsu/jigyosho_ichiran.html

### 愛媛
https://www.pref.ehime.jp/h20700/fukushi/syougai/ken_shi/index.html

### 高知
https://www.pref.kochi.lg.jp/soshiki/060301/kouji.html

### 福岡
1行目を削除して2行目をヘッダーに。
- https://www.pref.fukuoka.lg.jp/contents/shougaishashiteijigyousyo.html

### 佐賀
https://www.pref.saga.lg.jp/kiji0033428/index.html

### 長崎
PDF  
https://www.city.nagasaki.lg.jp/fukushi/440000/449006/p027150.html

### 熊本
ヘッダーの加工がかなり必要。  
https://www.pref.kumamoto.jp/soshiki/39/50669.html

### 大分
？

大分市  
http://www.city.oita.oita.jp/o089/kenko/fukushi/1323838778549.html

### 宮崎
？

宮崎市。使いにくいExcelファイル。  
https://www.city.miyazaki.miyazaki.jp/health/disabilities_welfare/other_services/272423.html

### 鹿児島
表6。事業者番号なし。障害福祉サービス等情報検索で番号を調べてGoogleスプレッドシートに入力すればインポート可能。手間大。  
http://www.pref.kagoshima.jp/ae04/kenko-fukushi/syogai-syakai/syakaifukushi/hokenfukushishisetu-list.html

### 沖縄
https://www.pref.okinawa.lg.jp/site/kodomo/shogaifukushi/old/20738.html
