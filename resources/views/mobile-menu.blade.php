<nav class="grid grid-cols-2 gap-2" aria-labelledby="mobile navigation">
    <a href="{{ route('detail-search') }}" class="p-6 bg-indigo-500 dark:bg-zinc-800 rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.search class="inline stroke-1"></x-icon.search>検索</div>
    </a>
    <a href="{{ route('location') }}" class="p-6 bg-indigo-500 dark:bg-zinc-800 rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.location class="inline stroke-1"></x-icon.location>近くで探す</div>
    </a>
    <a href="{{ route('history') }}" class="p-6 bg-indigo-500 dark:bg-zinc-800 rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.clock class="inline stroke-1"></x-icon.clock>履歴</div>
    </a>
    <a href="{{ route('help.user') }}" class="p-6 bg-indigo-500 dark:bg-zinc-800 rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.question class="inline stroke-1"></x-icon.question>ヘルプ</div>
    </a>
</nav>
