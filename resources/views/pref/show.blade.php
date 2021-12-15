<x-main-layout>
    <x-slot name="title">
        {{ $pref->name }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $pref->name }} | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ $pref->name.'の障害者グループホーム' }}
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
                @include('homes.item')
            @endforeach

            {{ $homes->links() }}

        </div>
    </div>
</x-main-layout>
