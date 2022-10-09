<article {{ $attributes }} class="ring-1 ring-indigo-500 dark:ring-gray-800 mb-3">
    <h3 class="text-xl bg-indigo-500 text-white dark:bg-gray-800 dark:text-white px-6 py-3">
        {{ $date }}
    </h3>
    <div class="p-6 prose prose-indigo dark:prose-invert max-w-none">
        {{ $slot }}
    </div>
</article>
