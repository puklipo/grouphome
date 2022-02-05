<x-main-layout>
    <x-slot name="title">
        {{ $pref->name }}{{ request('area') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ request()->pref?->name . request()->area }} [{{ $homes->total() }}]
        </h1>
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $pref->name }}{{ request('area') }} | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ $pref->name.request('area').'の障害者グループホーム' }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="p-3">
                {{ $homes->links() }}
            </div>
            @forelse($homes as $home)
                @include('homes.index-item')
            @empty
                <div class="p-3 font-bold">見つかりませんでした。</div>
            @endforelse

            <div class="p-3">
                {{ $homes->links() }}
            </div>
        </div>
    </div>
</x-main-layout>
