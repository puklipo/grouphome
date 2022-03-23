<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($title){{ $title }} | @endisset{{ config('app.name', 'Laravel') }}</title>

    @isset($description)
    <meta name="description" content="{{ $description }}">
    @endisset

    @isset($ogp)
    {{ $ogp }}
    @endisset

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased dark:bg-black dark:text-white">

        <div class="flex flex-col sm:flex-row max-w-full mx-auto">
            <main class="flex-initial flex-grow">
                <x-jet-banner />

                @livewire('navigation-menu')

                @if (isset($header))
                    <header class="bg-white dark:bg-black text-gray-800 dark:text-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 sm:ml-3 text-center sm:text-left">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                {{ $slot }}
            </main>

            @include('side')
        </div>
    </div>

    @livewireScripts
</body>

</html>
