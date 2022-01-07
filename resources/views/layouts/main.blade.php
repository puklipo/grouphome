<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($title){{ $title }} | @endisset{{ config('app.name', 'Laravel') }}</title>

    @isset($ogp)
    {{ $ogp }}
    @endisset

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=M+PLUS+2:wght@400;500;600;700;800;900&display=swap">

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

                {{ $slot }}
            </main>

            @include('side')
        </div>
    </div>

    @livewireScripts
</body>

</html>
