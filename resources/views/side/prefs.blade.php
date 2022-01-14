<ul>
    <li><a href="{{ route('area.index') }}" class="font-bold text-indigo-500 dark:text-white hover:underline">自治体一覧</a></li>

    @foreach($prefs as $pref)
        <li>
            <a href="{{ route('pref', $pref) }}"
               class="block bg-white shadow-sm rounded-md font-bold text-lg text-indigo-500 hover:text-indigo-600 p-2 my-3 dark:bg-gray-800 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 @if(request()->pref?->is($pref)) border-2 border-indigo-500 dark:border-gray-500 @endif">
                {{ $pref->name }}
                [{{ $pref->homes_count }}]
            </a>
        </li>
    @endforeach
</ul>
