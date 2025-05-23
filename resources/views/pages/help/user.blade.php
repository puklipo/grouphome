<?php
use function Laravel\Folio\name;

name('help.user');
?>

<x-main-layout>
    <x-slot name="title">
        {{ __('利用者向けの使い方') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('利用者向けの使い方') }}
        </h1>
    </x-slot>

    <div class="py-6">

        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="prose dark:prose-invert prose-indigo prose-a:text-indigo-500 max-w-none p-3">

                <h2>グループホーム（共同生活援助）とは</h2>
                <p>障害福祉サービスのひとつ。多少の支援があれば自立して生活できる人のための住居サービス。</p>

                <p class="text-sm text-gray-500">高齢者向けのグループホームもありますがここでは扱いません。</p>

                <h2>利用方法</h2>
                <p>相談支援員やソーシャルワーカーからの連絡しか受け付けてないグループホームも多いので利用したい場合はまず相談支援員に相談しましょう。</p>

                <p>障害福祉サービスなので自治体での認定調査や支給決定が必要です。グループホームに直接申し込んでも利用できません。</p>

                <p>見学、体験利用を経て本利用。基本的には体験は必須です。</p>

                <h2>立地</h2>
                <p>グループホームの目的は「住み慣れた土地で生活するため」なので探す時には立地が最重要。<a href="{{ route('area.index') }}">自治体一覧</a>から希望の自治体を選ぶ所から始めます。グループホームは少ないので自治体で絞り込んだら数えられる程度の候補しかありません。一つずつ調べて利用するグループホームを探しましょう。
                </p>
                <p><a href="{{ route('location') }}">現在地から探す</a>では近くのグループホームが表示されます。</p>

                <h2>費用</h2>
                <p>家賃・光熱費・食費などは各グループホームごとに決められていて支払いが必要です。障害基礎年金2級に収まる月7万円以下が大半。</p>

                <p>家賃などとは別に障害福祉サービスの自己負担分の費用も必要な場合もあります。住民税非課税なら0円なので障害年金とB型の工賃くらいの障害者なら0円で負担はない制度。</p>

                <p>グループホーム利用者かつ住民税課税な場合、自己負担分の上限が37200円に上がるのでグループホーム利用時にはよく検討しましょう。</p>

                <p>費用で並べ替えはできますが実際の所家賃の差はほとんどありません。食事の提供が1日2食か3食かで差が出てるので合計費用だけで比較せず詳細まで調べましょう。</p>

                <h2>家賃補助</h2>
                <p>住民税非課税なら「特定障害者特別給付費」で月1万円の家賃補助があります。さらに自治体独自の家賃補助がある場合も。</p>

                <p>ほとんどの利用者は実際の合計費用より安く利用できますが全員ではありません。小さい説明だけで家賃補助後の費用だけを書いてるグループホームもあるのでよく確認しましょう。</p>

                <h2>対象区分</h2>
                <p>グループホームを利用するには障害区分の認定が必要です。グループホームによって「区分3から6まで」のように条件を決めてるので「区分が足りずに利用できない」ということがよくあります。</p>

                <p>
                    検索する時は自分の区分以下を指定します。区分1の人が利用できるグループホームを探すには「区分なし」や「1以上」を指定して検索してください。「2以上」を指定した時に「なしや1も含めて表示」や逆に「2以上の3,4,5,6も含めて表示」するような動作はしません。表示する区分を複数選択するには<a
                        href="{{ route('detail-search') }}">詳細検索</a>を使用してください。
                </p>

                <p>デフォルトは「区分なし以上」。他の情報が入力されてないグループホームが区分なしでも正しい情報ではありません。</p>

                <p>対象区分は厳密に適用されてるとは限りません。「3以上」のグループホームでも1,2の人が利用できることもあるので最終的にはグループホームに直接問い合わせて確認が必要です。</p>

                <h2>サービス類型</h2>
                <p>今の主流は「介護サービス包括型」か「日中サービス支援型」。</p>

                <p>介護サービス包括型は日中は就労先などグループホームの外で活動している前提。体調が悪い時以外日中は必ず外出させる方針のグループホームもあるのでグループホームを選ぶ時にはよく検討しましょう。</p>

                <p>
                    日中サービス支援型なら日中もグループホームに滞在が可能なはずです。例えばA型・B型が在宅ワーク可能でも「介護サービス包括型」では外出を強制されて在宅ワークができないかもしれない。在宅ワークしたい場合は「日中サービス支援型」を探しましょう。</p>

                <h2>グループホームに問い合わせる</h2>
                <div><img src="{{ asset('images/help/mail1.png') }}" class="w-auto sm:w-1/2 shadow-sm rounded-md" alt="問い合わせる">
                </div>

                <h3>メールで問い合わせ</h3>
                <p><span class="text-red-500 font-bold">注：グループホーム事業者が当サイトに登録していないと使えません。</span></p>
                <ol>
                    <li>グループホームのページから「メールで問い合わせる」を選択。</li>
                    <li>メールアドレスの入力ミスを防ぐため、最初に自分のメールアドレスを入力します。入力したメール宛に問い合わせフォームのURLが送られるので正しいメールアドレスを入力したことが確認されます。
                        <img src="{{ asset('images/help/mail2.png') }}" class="w-auto sm:w-1/2 shadow-sm rounded-md"
                             alt="メールアドレスを入力">
                        <img src="{{ asset('images/help/mail3.png') }}" class="w-auto sm:w-1/2 shadow-sm rounded-md" alt="メール">
                    </li>
                    <li>届いた問い合わせフォームから送信してください。
                        <img src="{{ asset('images/help/mail4.png') }}" class="w-auto sm:w-1/2 shadow-sm rounded-md"
                             alt="お問い合わせフォーム"></li>
                </ol>

                <h3>電話で問い合わせ</h3>
                <ul>
                    <li>スマホならグループホームのページから「電話で問い合わせる」を選択。そのまま発信できます。</li>
                    <li>PCから見ている場合はページ内に書かれた電話番号にかけてください。</li>
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
