<ul>
    @foreach(\App\Models\Pref::withCount('homes')->latest('homes_count')->get() as $pref)
        <li>
            <a href="{{ route('pref', $pref) }}"
               class="block bg-white shadow-md rounded-md font-bold text-lg text-indigo-500 p-2 my-3 @if(request()->pref?->is($pref)) border-2 border-indigo-500 @endif">
                {{ $pref->name }}
                [{{ $pref->homes_count }}]
            </a>
        </li>
    @endforeach
</ul>
