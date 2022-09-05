<x-main-layout>
    <x-slot name="title">
        {{ __('事業者ダッシュボード') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('事業者ダッシュボード') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-3 space-x-2">
                <a href="{{ route('help.operator') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('事業者向け使い方') }}</a>
                {{--                <a href="{{ route('matching') }}"--}}
                {{--                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('土地マッチング') }}</a>--}}
            </div>

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                <h2 class="text-4xl p-3">管理グループホーム一覧 [{{ $homes->count() }}]</h2>
                <ul>
                    @foreach($homes as $home)
                        <li class="p-3 flex justify-between">
                            <a href="{{ route('home.show', $home) }}"
                               class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                                {{ $home->name }}
                            </a>
                            <span class="text-md text-gray-500 ml-6">{{ Str::limit($home->address, 50) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
