<div class="m-3">
    <div class="mt-3 mb-0 flex justify-between">
        <span class="bg-gray-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white dark:hover:text-gray-500">
            土地を貸したい
        </span>
        <span class="bg-gray-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white dark:hover:text-gray-500">
            掲載日 2022年2月21日
        </span>
    </div>

    <div class="border-4 border-gray-500 dark:border-gray-800">
        <div class="p-3">
            <h2 class="mt-1 text-5xl text-gray-500 dark:text-white font-extrabold dark:hover:text-white">
                〇〇県〇〇市
            </h2>

            @if($active)
                <table class="table-auto m-0">
                    <tr>
                        <th>住所</th>
                        <td>
                            〇〇県〇〇市...（マップ）
                        </td>
                    </tr>
                    <tr>
                        <th>土地の状態</th>
                        <td>
                            更地。建物なし。
                        </td>
                    </tr>
                    <tr>
                        <th>面積</th>
                        <td>
                            不明
                        </td>
                    </tr>
                    <tr>
                        <th>立地</th>
                        <td>
                            〇〇市と〇〇市の中間。 駅からは遠いので日常の買い物や送迎に自動車が必須。
                        </td>
                    </tr>
                    <tr>
                        <th>周辺環境</th>
                        <td>
                            店などはほとんどない。海の近く。
                        </td>
                    </tr>
                    <tr>
                        <th>電気・水道など</th>
                        <td>
                            使用可能。
                        </td>
                    </tr>
                    <tr>
                        <th>所有者コメント</th>
                        <td>...{{-- 元々は実家だった場所なのでグループホームとして利用してもらいつついずれ自分でも住みたい。--}}</td>
                    </tr>
                    <tr>
                        <th>連絡先</th>
                        <td>〇〇不動産 TEL</td>
                    </tr>
                </table>
            @else
                @includeIf('matching.disabled')
            @endif
        </div>
    </div>
</div>
