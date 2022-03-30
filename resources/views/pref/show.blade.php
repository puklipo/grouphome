<x-main-layout>
    <x-slot name="title">
        {{ $pref->name }}{{ $area }}
    </x-slot>

    <x-slot name="description">
        {{ $pref->name.$area.'の障害者グループホーム' }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $pref->name }}{{ $area }} | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ $pref->name.$area.'の障害者グループホーム' }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="p-3 bg-indigo-50 dark:bg-black sm:hidden print:hidden">
                @include('search.simple')
            </div>

            <livewire:home-index :pref="$pref" :area="$area"></livewire:home-index>
        </div>
    </div>
</x-main-layout>
