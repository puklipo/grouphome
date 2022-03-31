@props(['enabled' => true])

@if($enabled)
    <span {{ $attributes->class(['text-md bg-indigo-500 dark:bg-gray-700 border border-indigo-500 dark:border-gray-700 text-white rounded-full px-3 py-1 m-1 print:text-indigo-500 print:bg-white print:font-bold']) }} title="{{ $slot }}">{{ $slot }}</span>
@else
    <span {{ $attributes->class(['text-md bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-500 rounded-full px-3 py-1 m-1 opacity-70']) }} title="{{ $slot }}"  aria-hidden="true"><del class="no-underline print:opacity-90">{{ $slot }}</del></span>
@endif
