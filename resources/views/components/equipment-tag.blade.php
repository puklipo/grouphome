@props(['enabled' => false])

@if($enabled)
    <span {{ $attributes->class(['text-sm bg-indigo-500 dark:bg-gray-700 border border-indigo-500 dark:border-gray-700 text-white rounded-full px-3 py-1']) }}>{{ $slot }}</span>
@else
    <span {{ $attributes->class(['text-sm bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-500  rounded-full px-3 py-1']) }}><del>{{ $slot }}</del></span>
@endif
