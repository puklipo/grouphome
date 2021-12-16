<div class="bg-white w-full m-6">
    <div class="my-3">
        <span class="bg-indigo-500 text-white px-6 py-1">
            <a href="{{ route('pref', $home->pref) }}">
                {{ $home->pref->name }}
            </a>
        </span>
    </div>

    <a href="{{ route('home.show', $home) }}">
        <h2 class="text-5xl text-indigo-500 font-extrabold tracking-widest hover:text-indigo-600">
            {{ $home->name }}
        </h2>
    </a>

    <div class="text-md my-3">{{ $home->address }}</div>
</div>
