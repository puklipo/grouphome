@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 dark:border-b-4 border-indigo-400 dark:border-white text-sm font-medium leading-5 text-gray-900 dark:text-gray-200 focus:outline-hidden focus:border-indigo-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-white hover:text-gray-400 hover:border-gray-300 focus:outline-hidden focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
