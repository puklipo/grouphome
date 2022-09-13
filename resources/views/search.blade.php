<x-main-layout>
    <x-slot name="title">
        {{ __('詳細検索') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('詳細検索') }}
        </h1>
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ __('詳細検索') }}
            </x-slot>

            <x-slot name="description">
                {{ __('詳細検索') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            @can('admin')
                <div class="ml-6">
                    <span class="font-bold text-red-500">
                        <x-icon.lock class="inline"></x-icon.lock>{{ cache('detail-search-count') }}
                    </span>
                </div>
            @endcan

            <livewire:detail-search/>
        </div>
    </div>
</x-main-layout>
