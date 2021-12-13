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

            @foreach($homes as $home)
                <div class="bg-white w-full m-6">
                    <a href="{{ route('home.show', $home) }}">
                        <div class="text-4xl text-indigo-500 font-bold tracking-widest hover:text-indigo-600">{{ $home->name }}</div>
                    </a>
                    <div class="text-md">{{ $home->address }}</div>

                </div>
            @endforeach

            {{ $homes->links() }}

        </div>
    </div>
</x-main-layout>
