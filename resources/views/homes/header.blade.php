<div class="mt-3 mb-0 flex justify-between">
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white dark:hover:text-gray-500">
            <a href="{{ route('pref', $home->pref) }}">
                {{ $home->pref->name }}
            </a>
        </span>
    @if(filled($home->area))
        <span class="bg-indigo-400 text-white px-6 py-1 dark:bg-gray-800 dark:text-white dark:hover:text-gray-500">
                <a href="{{ route('pref.area', [$home->pref, $home->area]) }}">
                    {{ $home->area }}
                </a>
            </span>
    @endif
</div>
