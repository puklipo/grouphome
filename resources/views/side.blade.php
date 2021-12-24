<aside class="w-full sm:w-64 flex-none sm:min-h-screen sm:order-first order-last p-5 sm:border-r bg-indigo-50 dark:bg-black dark:text-white">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5 dark:text-white">
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </h2>

    <div class="my-6">
        <form action="{{ request()->routeIs(['pref']) ? url()->current() : route('index') }}" method="get"
              class="flex">
            <x-jet-label for="search" value="{{ __('検索') }}" class="hidden"/>
            <x-jet-input name="q" type="search" class="flex-auto sm:w-1/2 rounded-r-none dark:bg-gray-800"
                         value="{{ request('q') }}"
                         placeholder="{{ request()->routeIs(['pref']) ? request()->pref->name.'から検索' : 'キーワード検索' }}"
            />
            <x-jet-button class="rounded-l-none min-w-max" title="検索">検索</x-jet-button>
        </form>
    </div>

    <div class="my-6">
        @include('side.prefs')
    </div>

    @if (isset($side))
        {{ $side }}
    @endif

    <div class="text-sm mt-10 p-1 border-t">Copyright&copy; <a href="https://sds.fukuoka.jp/"
                                                               class="font-bold text-indigo-500 dark:text-white hover:underline"
                                                               target="_blank" rel="noopener">ポップカルチャースタジオ未来図</a> All
        Rights Reserved.
    </div>
</aside>
