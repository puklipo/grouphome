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
                   class="font-bold text-indigo-500 dark:text-white hover:underline" wire:navigate>{{ __('事業者向け使い方') }}</a>
                <a href="{{ route('contact') }}"
                   class="font-bold text-indigo-500 dark:text-white hover:underline" wire:navigate>{{ __('お問い合わせ') }}</a>
                {{--                <a href="{{ route('matching') }}"--}}
                {{--                   class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('土地マッチング') }}</a>--}}
            </div>

            <div class="bg-white dark:bg-black overflow-hidden mx-2 sm:mx-0 sm:rounded-lg border border-gray-200">
                <h2 class="text-xl p-3 bg-gray-100 dark:bg-gray-900">管理グループホーム一覧 [{{ $homes->count() }}]</h2>
                <ul>
                    @foreach($homes as $home)
                        <li class="p-3 flex justify-between border-t border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800">
                            <a href="{{ route('home.show', $home) }}"
                               class="text-xl text-indigo-500 dark:text-white font-bold hover:underline" wire:navigate>
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
