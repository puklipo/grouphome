<div class="bg-white m-6 dark:bg-black dark:text-white">
    @include('homes.header')

    <a href="{{ route('home.show', $home) }}">
        <div class="border-4 border-indigo-500 p-3 dark:bg-black dark:text-white dark:border-gray-800">
            <h2 class="text-5xl text-indigo-500 dark:text-white font-extrabold tracking-widest hover:text-indigo-600 dark:hover:text-gray-500">
                {{ $home->name }}
            </h2>
            <div class="text-md my-3">{{ $home->address }}</div>
        </div>
    </a>

</div>
