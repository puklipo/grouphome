<x-main-layout>
    <x-slot name="title">
        {{ __('自治体一覧') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('自治体一覧') }}
        </h1>
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ __('自治体一覧') }} | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ __('自治体一覧') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <x-breadcrumbs-back/>

            <div class="p-3">

                <div id="index">

                    <div x-data @svgmap-click.dot="location.hash = $event.target.getAttribute('data-name')">
                        @includeIf('map')
                    </div>

                    @foreach($prefs as $pref)
                        <a href="#{{ $pref->name }}"
                           class="text-indigo-500 dark:text-white hover:underline">
                            {{ $pref->name }}
                        </a>
                    @endforeach
                </div>

                @foreach($areas as $pref => $homes)
                    <h2 class="text-2xl my-3">
                        <a href="{{ route('pref', $prefs->find($pref)) }}"
                           id="{{ $prefs->find($pref)->name }}"
                           class="text-gray-500 dark:text-white hover:underline tracking-widest" wire:navigate>
                            {{ $prefs->find($pref)->name }}
                        </a>

                        <a href="#index" class="text-gray-500">
                            <x-icon.arrow-up class="inline"/>
                        </a>
                    </h2>

                    <ul class="ml-6 list-disc">
                        @foreach($homes->sortByDesc('area_count') as $home)
                            <li class="text-gray-300">
                                <a href="{{ route('pref', [$home->pref, $home->area]) }}"
                                   class="text-xl text-indigo-500 dark:text-white hover:underline" wire:navigate>
                                    {{ $home->area }} [{{ $home->area_count }}]
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>

        </div>
    </div>

</x-main-layout>
