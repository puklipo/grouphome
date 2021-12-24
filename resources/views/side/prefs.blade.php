<ul>
    @foreach(\App\Models\Pref::withCount('homes')->latest('homes_count')->get() as $pref)
        <li>
            <a href="{{ route('pref', $pref) }}"
               class="block bg-white shadow-sm rounded-md font-bold text-lg text-indigo-500 hover:text-indigo-600 p-2 my-3 dark:bg-gray-800 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 @if(request()->pref?->is($pref)) border-2 border-indigo-500 dark:border-gray-500 @endif">
                {{ $pref->name }}
                [{{ $pref->homes_count }}]
            </a>
        </li>
    @endforeach
</ul>
