@props(['enabled' => false, 'icon'])

@if($enabled)
    <span {{ $attributes->class(['text-md bg-indigo-500 dark:bg-gray-700 border-2 border-indigo-500 dark:border-gray-700 text-white rounded-full px-3 py-1 m-1 print:text-indigo-500 print:bg-white print:font-bold inline-flex']) }} title="{{ $slot }}">
{{--        @isset($icon)<img src="{{ asset('svg/'.$icon.'.svg') }}" class="w-6 h-6 fill-white" alt="{{ $slot }}">@endisset--}}
            {{ $slot }}</span>
@else
    <span {{ $attributes->class(['text-md bg-white dark:bg-gray-900 border border-gray-500 dark:border-gray-700 border-dashed text-gray-500 rounded-full px-3 py-1 m-1 opacity-90  inline-flex']) }} title="{{ $slot }}"  aria-hidden="true">
{{--        @isset($icon)--}}
{{--            <img src="{{ asset('svg/'.$icon.'.svg') }}" class="w-6 h-6 fill-gray-500" alt="{{ $slot }}">--}}
{{--        @endisset--}}
        <del class="line-through opacity-30 print:opacity-90">{{ $slot }}</del></span>
@endif
