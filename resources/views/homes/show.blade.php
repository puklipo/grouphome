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
                {{ $home->name }} {{ $home->address }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="bg-white m-6">

                @include('homes.header')

                <div class="border-4 border-indigo-500 p-3">
                    <h1 class="text-7xl text-indigo-500 font-extrabold tracking-widest">
                        {{ $home->name }}
                    </h1>

                    <div class="text-md my-3">{{ $home->address }}</div>

                    <div class="text-md my-3">{{ $home->company }}</div>
                    <div class="text-md my-3">{{ $home->tel }}</div>

                    @isset($home->url)
                        <div class="text-md my-3">
                            <a href="{{ $home->url }}" target="_blank"
                               class="text-indigo-500 font-bold hover:underline">
                                URL
                            </a>
                        </div>
                    @endisset

                    <div class="text-md my-3">指定年月日 {{ $home->released_at }}</div>
                </div>

                <div class="mt-6">
                    <span class="bg-indigo-500 text-white px-6 py-1">
                          マップ
                    </span>
                </div>
                <div class="border-4 border-indigo-500 p-3">
                    @isset($home->map)
                        {!! $home->map !!}
                    @else
                        <iframe
                            src="https://maps.google.co.jp/maps?output=embed&q={{ urlencode($home->address) }}&z=16&t=h"
                            class="w-full h-96 border-0" allowfullscreen="" loading="lazy"></iframe>

                        <div>
                            <a href="https://www.google.com/maps/search/{{ rawurlencode($home->address.' '.$home->name) }}"
                               target="_blank"
                               class="text-xl text-indigo-500 font-bold hover:underline">
                                Googleマップで検索
                            </a>
                        </div>
                    @endisset
                </div>

                <div class="mt-6">
                    <span class="bg-indigo-500 text-white px-6 py-1">
                          <a href="{{ route('pref', $home->pref) }}">
                            {{ $home->pref->name }}のグループホーム
                        </a>
                    </span>
                </div>
                <div class="border-4 border-indigo-500 p-3">
                    <ul>
                        @foreach($home->pref->homes()->inRandomOrder()->limit(10)->get() as $h)
                            <li class="my-1 flex justify-between">
                                <a href="{{ route('home.show', $h) }}"
                                   class="text-xl text-indigo-500 font-bold hover:underline">
                                    {{ $h->name }}
                                </a>
                                <span class="text-md text-gray-500 ml-6">{{ Str::limit($h->address, 30) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
