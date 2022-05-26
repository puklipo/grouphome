<x-main-layout>
    <x-slot name="title">
        {{ $home->name }} | {{ $home->pref->name }}
    </x-slot>

    <x-slot name="description">
        {{ $home->description }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $home->name }}
            </x-slot>

            <x-slot name="description">
                {{ $home->description }}
            </x-slot>

            @if(filled($home->photo->cover) && Storage::exists($home->photo->cover))
                <x-slot name="image">
                    {{ Storage::url($home->photo->cover) }}
                </x-slot>
            @endif
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="m-3">

                @include('homes.header')

                <x-box>
                    @include('homes.cover')

                    <div class="p-3">
                        <h1 class="text-7xl text-indigo-500 dark:text-white font-extrabold tracking-widest break-all">
                            {{ $home->name }}
                        </h1>

                        <div class="text-md my-3">{{ $home->address }}</div>

                        <div class="text-md my-3">{{ $home->company }}</div>
                        <div class="text-md my-3">{{ $home->tel }}</div>

                        @isset($home->url)
                            <div class="text-md my-3">
                                <a href="{{ $home->url }}" target="_blank"
                                   class="text-indigo-500 dark:text-white font-bold hover:underline">
                                    {{ Str::limit($home->url) }}
                                </a>
                            </div>
                        @endisset

                        @isset($home->wam)
                            <div class="text-md my-3">
                                <a href="{{ $home->wam }}" target="_blank"
                                   class="text-indigo-500 dark:text-white font-bold hover:underline">
                                    {{ Str::limit($home->wam) }}
                                </a>
                            </div>
                        @endisset

                        @isset($home->released_at)
                            <div class="text-md my-3">指定年月日 {{ $home->released_at->toDateString() }}</div>
                        @endisset

                        @if(file_exists(resource_path('views/report/'.$home->id.'.blade.php')))
                            <a href="{{ route('report', $home->id)}}" class="text-indigo-500 dark:text-white hover:underline">
                                {{ __('体験レポート') }}
                            </a>
                        @endif

                    </div>
                </x-box>

                <livewire:basic-editor :home="$home"></livewire:basic-editor>

                <livewire:introduction-editor :home="$home"></livewire:introduction-editor>

                <livewire:vacancy-editor :home="$home"></livewire:vacancy-editor>

                <livewire:condition-editor :home="$home"></livewire:condition-editor>

                <livewire:cost-editor :home="$home"></livewire:cost-editor>

                <livewire:facility-editor :home="$home"></livewire:facility-editor>

                <livewire:equipment-editor :home="$home"></livewire:equipment-editor>

                <livewire:houserule-editor :home="$home"></livewire:houserule-editor>

                @include('homes.photo')

                @include('homes.map')

                @include('homes.related')

                @includeIf('homes.cta')

                @include('homes.operator')

                @include('homes.mail')
            </div>

        </div>
    </div>
</x-main-layout>
