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

            <x-breadcrumbs-back/>

            <div class="px-3">
                {{ $homes->links() }}
            </div>

            @foreach($homes as $home)
                @include('homes.item')
            @endforeach

            <div class="px-3">
                {{ $homes->links() }}
            </div>

        </div>
    </div>
</x-main-layout>
