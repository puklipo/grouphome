<x-main-layout>
    <x-slot name="title">
        {{ $pref->name }}{{ $area }}
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

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <livewire:pref-index :pref="$pref" :area="$area"></livewire:pref-index>
        </div>
    </div>
</x-main-layout>
