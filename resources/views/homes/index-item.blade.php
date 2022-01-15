<div class="m-3">
    @include('homes.header')

    <div class="border-4 border-indigo-500 dark:border-gray-800">

        @if(Storage::exists($home->photo->cover))
            <img src="{{ Storage::url($home->photo->cover) }}"
                 class="m-0 w-full max-h-20 sm:max-h-36 object-cover object-center overflow-hidden">
        @endif

        <div class="p-3">
            <a href="{{ route('home.show', $home) }}">
                <h2 class="inline-flex text-5xl text-indigo-500 dark:text-white font-extrabold tracking-widest break-all hover:text-indigo-600 dark:hover:text-white dark:hover:underline">
                    {{ $home->name }}
                </h2>
            </a>
            <div class="text-md my-3">{{ $home->address }}</div>
        </div>
    </div>

    <div class="mt-0 mb-3 flex justify-between">

            <span class="bg-indigo-400 text-white px-6 pb-1 dark:bg-gray-800 dark:text-white">
               @if($home->level > 0)
                    区分{{ $home->level }}以上
                @else
                    区分なし
                @endif
            </span>

        @isset($home->type)
            <span class="bg-indigo-400 text-white px-6 pb-1 dark:bg-gray-800 dark:text-white">
                {{ $home->type->type }}
            </span>
        @endisset
    </div>

</div>
