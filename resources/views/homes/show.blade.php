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
            <h1 class="text-4xl hidden">{{ $home->name }}</h1>

            <div class="bg-white w-full m-6">
                <div class="text-7xl text-indigo-500 font-extrabold tracking-widest">
                    {{ $home->name }}
                </div>

                <div class="text-md my-3">{{ $home->address }}</div>
                <div class="text-md my-3">{{ $home->company }}</div>
                <div class="text-md my-3">指定年月日 {{ $home->released_at }}</div>

            </div>

        </div>
    </div>
</x-main-layout>
