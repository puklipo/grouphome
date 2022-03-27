<div {{ $attributes->class(['flex justify-between']) }}>
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white print:text-indigo-500 print:bg-white">
        {{ $left ?? '' }}
    </span>
    @isset($right)
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white print:text-indigo-500 print:bg-white">
            {{ $right }}
        </span>
    @endisset
</div>
