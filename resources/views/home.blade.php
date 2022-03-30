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

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <x-breadcrumbs-back/>

            @includeIf('map')
            @pushOnce('scripts')
            <script>
                document.addEventListener('svgmap.click', function(event) {
                    location.href = event.target.id.replace('-', '/')
                }, false)
            </script>
            @endPushOnce

            <div class="p-3 sm:hidden print:hidden">
                @includeIf('mobile-menu')
            </div>

            <livewire:home-index></livewire:home-index>

        </div>
    </div>
</x-main-layout>
