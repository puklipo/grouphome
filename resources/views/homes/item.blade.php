<div class="bg-white m-6">
    @include('homes.header')

    <a href="{{ route('home.show', $home) }}">
        <div class="border-4 border-indigo-500 p-3">
            <h2 class="text-5xl text-indigo-500 font-extrabold tracking-widest hover:text-indigo-600">
                {{ $home->name }}
            </h2>
            <div class="text-md my-3">{{ $home->address }}</div>
        </div>
    </a>

</div>
