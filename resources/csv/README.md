# CSV
WAMのオープンデータ、「共同生活援助」をダウンロード。  
https://www.wam.go.jp/content/wamnet/pcpub/top/sfkopendata/

## 更新作業
1. 古いwam.csvの名前を変更。wam.csv→wam_YYYY_MM.csv
2. 新しいcsvの名前をwam.csvにして入れ替え。
3. 開発環境でインポートして問題なければ本番環境でもインポート。
4. 古いcsvはコンテナサイズが大きくなってデプロイできなくなるのでたまに削除。

開発環境
```bash
sail art gh:import
```

本番環境ではVaporのプロジェクトページのCommandsから実行。
```bash
php artisan gh:import
```

## CSVのデータが間違ってる場合
`config/patch.php`と`app/Casts/Telephone.php`などを使って表示時に正しいデータに置き換える。

## WAM以外のデータ
各自治体で公開しているデータにはWAMにない事業所も含まれていた。WAMのオープンデータを使う前にインポートした事業所情報も本番環境のデータベースには残っている。
