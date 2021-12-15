<x-main-layout>
    <x-slot name="title">
        {{ $home->name }} | {{ $home->pref->name }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $home->name }}
            </x-slot>

            <x-slot name="description">
                {{ $home->name }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white w-full m-6">
                <div class="mt-3">
                    <span class="bg-indigo-500 text-white px-6 py-1">{{ $home->pref->name }}</span>
                </div>

                <div class="border-4 border-indigo-500 p-3">
                    <h1 class="text-7xl text-indigo-500 font-extrabold tracking-widest">
                        {{ $home->name }}
                    </h1>

                    <div class="text-md my-3">{{ $home->address }}</div>
                    <div class="text-md my-3">{{ $home->company }}</div>
                    <div class="text-md my-3">指定年月日 {{ $home->released_at }}</div>
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
