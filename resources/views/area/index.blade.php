<x-main-layout>
    <x-slot name="title">
        自治体一覧
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                自治体一覧 | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                自治体一覧
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <h1 class="text-4xl p-3">自治体一覧</h1>

            <x-breadcrumbs-back/>

            <div class="p-3">
                @foreach($areas as $pref => $homes)
                    <h2 class="text-2xl my-3 font-bold">{{ $pref }}</h2>

                    <ul>
                        @foreach($homes as $home)
                            <li>
                                <a href="{{ route('pref.area', [$home->pref, $home->area]) }}"
                                   class="text-xl text-indigo-500 dark:text-white hover:underline">
                                    {{ $home->area }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>

        </div>
    </div>
</x-main-layout>
