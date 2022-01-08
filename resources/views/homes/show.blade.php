<x-main-layout>
    <x-slot name="title">
        {{ $home->name }} | {{ $home->pref->name }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $home->name }}
            </x-slot>

            <x-slot name="description">
                {{ $home->name }} {{ $home->address }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="m-6">

                @include('homes.header')

                <div class="border-4 border-indigo-500 p-3 dark:border-gray-800">
                    <h1 class="text-7xl text-indigo-500 dark:text-white font-extrabold tracking-widest">
                        {{ $home->name }}
                    </h1>

                    <div class="text-md my-3">{{ $home->address }}</div>

                    <div class="text-md my-3">{{ $home->company }}</div>
                    <div class="text-md my-3">{{ $home->tel }}</div>

                    @isset($home->url)
                        <div class="text-md my-3">
                            <a href="{{ $home->url }}" target="_blank"
                               class="text-indigo-500 dark:text-white font-bold hover:underline">
                                URL
                            </a>
                        </div>
                    @endisset

                    @isset($home->wam)
                        <div class="text-md my-3">
                            <a href="{{ $home->wam }}" target="_blank"
                               class="text-indigo-500 dark:text-white font-bold hover:underline">
                                WAM URL
                            </a>
                        </div>
                    @endisset

                    <div class="text-md my-3">指定年月日 {{ $home->released_at->toDateString() }}</div>
                </div>

                @include('homes.conditions')

                <livewire:equipment-editor :home="$home"></livewire:equipment-editor>

                <livewire:facility-editor :home="$home"></livewire:facility-editor>

                @include('homes.map')

                @include('homes.related')

                @include('homes.operator')
            </div>

        </div>
    </div>
</x-main-layout>
