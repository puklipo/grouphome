<div class="mt-6">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        <a href="{{ route('pref', $home->pref) }}">
            {{ $home->pref->name }}のグループホーム
        </a>
    </span>
</div>
<x-box class="p-3">
    <ul>
        @foreach($home->pref->homes()->inRandomOrder()->limit(10)->get() as $h)
            <li class="my-1 flex justify-between">
                <a href="{{ route('home.show', $h) }}"
                   class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                    {{ $h->name }}
                </a>
                <span class="text-md text-gray-500 ml-6">{{ Str::limit($h->address, 30) }}</span>
            </li>
        @endforeach
    </ul>
</x-box>
