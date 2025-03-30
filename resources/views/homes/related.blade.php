<div class="print:hidden">
    <x-box-header class="mt-6">
        <x-slot name="left">
            <a href="{{ route('pref', ['pref' => $home->pref]) }}" class="dark:hover:text-gray-300">
                {{ $home->pref->name }}のグループホーム
            </a>
        </x-slot>
    </x-box-header>

    <x-box class="p-3">
        <ul>
            @foreach($home->pref->homes()->inRandomOrder()->limit(10)->get() as $h)
                <li class="my-1 flex justify-between">
                    <a href="{{ route('home.show', $h) }}"
                       class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                        {{ $h->name }}
                    </a>
                    <span class="text-md text-gray-500 dark:text-gray-400 ml-6">{{ Str::limit($h->address, 30) }}</span>
                </li>
            @endforeach
        </ul>
    </x-box>
</div>
