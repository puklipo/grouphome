<aside
    class="w-full sm:w-64 flex-none sm:min-h-screen sm:order-first order-last p-5 sm:border-r bg-indigo-50 dark:bg-black dark:text-white print:hidden">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-5 dark:text-white">
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </h1>

    <div class="my-6">
        @includeIf('search.simple')
    </div>

    <div class="my-6">
        @includeIf('side.prefs')
    </div>

    @isset($side)
        {{ $side }}
    @endisset

    <div class="my-6">
        <ul class="space-y-1">
            <li>
                <a href="{{ route('help.user') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('利用者向け使い方') }}</a>
            </li>
            @guest()
                <li>
                    <a href="{{ route('login') }}"
                       class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('事業者用ログイン') }}</a>
                </li>
            @endguest
            <li>
                <a href="{{ route('help.operator') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('事業者向け使い方') }}</a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('お問い合わせ') }}</a>
            </li>
            <li>
                <a href="{{ route('matching') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('土地マッチング') }}</a>
            </li>
            <li>
                <a href="{{ route('license') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('利用規約・ライセンス') }}</a>
            </li>
        </ul>
    </div>

    @includeIf('side.qr')

    @can('admin')
        <div class="my-6">
            <a href="{{ route('admin') }}"
               class="font-bold text-red-500 hover:underline">
                {{ __('管理画面') }}
            </a>
        </div>
    @endcan

    <footer class="mt-10 p-1 border-t">
        <small class="text-sm">
            Copyright&copy; <a href="https://pcs-works.vercel.app/"
                               class="font-bold text-indigo-500 dark:text-white hover:underline"
                               target="_blank" rel="noopener">ポップカルチャースタジオ未来図</a>
            All Rights Reserved.
        </small>
    </footer>
</aside>
