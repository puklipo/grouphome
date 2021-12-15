<x-main-layout>
    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ config('app.name') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <h1 class="text-4xl hidden">{{ config('app.name', 'Laravel') }}</h1>

            {{ $homes->links() }}

            @foreach($homes as $home)
                <div class="bg-white w-full m-6">
                    <div class="my-3">
                        <span class="bg-indigo-500 text-white px-6 py-1">{{ $home->pref->name }}</span>
                    </div>

                    <a href="{{ route('home.show', $home) }}">
                        <h2 class="text-5xl text-indigo-500 font-extrabold tracking-widest hover:text-indigo-600">
                            {{ $home->name }}
                        </h2>
                    </a>

                    <div class="text-md my-3">{{ $home->address }}</div>

                </div>
            @endforeach

            {{ $homes->links() }}

        </div>
    </div>
</x-main-layout>
