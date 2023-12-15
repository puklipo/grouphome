<ul>
    <li><a href="{{ route('area.index') }}" class="font-bold text-lg text-indigo-500 dark:text-white hover:underline" wire:navigate>自治体一覧</a></li>

    @foreach($prefs as $pref)
        <li>
            <a href="{{ route('pref', $pref) }}" wire:navigate
               class="block bg-white shadow-sm rounded-md font-bold text-lg text-indigo-500 hover:ring-indigo-600 dark:hover:ring-gray-500 hover:ring-1 p-2 my-3 dark:bg-gray-800 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 @if(request()->pref?->is($pref)) ring-1 dark:ring-2 ring-indigo-500 dark:ring-gray-500 @endif">
                {{ $pref->name }}
                [{{ $pref->homes_count }}]
            </a>
        </li>
    @endforeach
</ul>
