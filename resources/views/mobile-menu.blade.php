<div class="grid grid-cols-2 gap-2">
    <a href="{{ route('detail-search') }}" class="p-6 bg-indigo-500 rounded-md rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.search class="inline"></x-icon.search>検索</div>
    </a>
    <a href="{{ route('area.index') }}" class="p-6 bg-indigo-500 rounded-md rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.location class="inline"></x-icon.location>自治体一覧</div>
    </a>
    <a href="{{ route('history') }}" class="p-6 bg-indigo-500 rounded-md rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.collection class="inline"></x-icon.collection>履歴</div>
    </a>
    <a href="{{ route('help.user') }}" class="p-6 bg-indigo-500 rounded-md rounded-md">
        <div class="text-center text-white text-xl font-bold"><x-icon.question class="inline"></x-icon.question>ヘルプ</div>
    </a>
</div>
