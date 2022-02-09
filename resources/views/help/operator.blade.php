<x-main-layout>
    <x-slot name="title">
        {{ __('グループホーム事業者向けの使い方') }}
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <h1 class="text-4xl my-10">{{ __('グループホーム事業者向けの使い方') }}</h1>

            <div class="prose dark:prose-invert prose-indigo prose-a:text-indigo-500 max-w-none">

                <h2>事業者向け有料サービス</h2>
                <div>事業者向けのグループホームの詳細情報を入力する機能は有料で提供しています。事前に運営会社まで<a href="{{ route('contact') }}">連絡</a>してください。</div>

                <h2>ユーザー登録</h2>
                <ol>
                    <li>ユーザー登録ページから登録します。</li>
                    <li>確認用のメールが届きます。</li>
                </ol>

                <h2>グループホームの管理事業者として申請</h2>
                <ol>
                    <li>管理するグループホームを検索。</li>
                    <li>
                        グループホームのページの一番下に「管理事業者として申請」ボタンがあるので申請。
                        <img src="{{ asset('images/help/ope1.png') }}" class="w-auto shadow rounded-md" alt="申請ボタン">
                    </li>
                    <li>承認後管理できるようになりますのでしばらくお待ちください。</li>
                    <li>一つのグループホームに対して複数のユーザーが管理事業者になることもできます。事業者内でユーザーアカウントを共有したくない場合は複数のユーザーを作成してください。</li>
                </ol>

                <h2>ダッシュボード</h2>
                <ol>
                    <li>管理事業者として承認されたグループホームはダッシュボードの管理グループホーム一覧に表示されます。
                        <img src="{{ asset('images/help/ope2.png') }}" class="w-auto shadow rounded-md" alt="ダッシュボード">
                    </li>
                </ol>

                <h2>グループホーム情報の更新</h2>
                <ol>
                    <li>管理事業者はグループホームのページで直接変更できます。</li>
                    <li>「更新」ボタンのある項目はボタンを押したタイミングで更新、それ以外のチェックボックスなどは変更したらすぐに更新が反映されます。
                        <video controls loop width="640">
                            <source src="{{ asset('images/help/ope3.mov') }}" type="video/mp4">
                        </video>
                    </li>
                    <li>公式サイトなどで公開済みの情報は当サイトのスタッフが更新していることもあります。</li>
                </ol>

                <h2>ヒント</h2>
                <ul>
                    <li>
                        当サイト内では一つの事業者番号ごとに一つのグループホームしか登録できません。WAMの元データに同じ事業者番号で複数のグループホームが登録されている場合は一つしか残りません。変更が可能なら事業者番号を変更してください。
                    </li>
                </ul>

            </div>
        </div>

    </div>
</x-main-layout>
