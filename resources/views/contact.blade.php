<x-main-layout>
    <x-slot name="title">
        {{ __('お問い合わせ') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('グループホーム事業者用お問い合わせフォーム') }}
        </h1>
    </x-slot>

    <div class="py-3">
        <div class="sm:px-6 lg:px-8">
            <ul class="flex flex-row space-x-2 px-3">
                <li>
                    <a href="{{ route('help.operator') }}"
                       class="font-bold text-indigo-500 dark:text-white hover:underline">{{ __('事業者向け使い方') }}</a>
                </li>
                @can('admin')
                    <li>
                        <a href="{{ route('admin.contacts') }}"
                           class="font-bold text-red-500 hover:underline">
                            <x-icon.lock class="inline"></x-icon.lock>{{ __('お問い合わせ一覧') }}</a>
                    </li>
                @endcan
            </ul>

            <div class="m-3 text-lg text-red-500 font-bold">
                ここはグループホーム事業者から当サイトへの問い合わせ用フォームです。
            </div>

            <livewire:contact-form/>
        </div>
    </div>
</x-main-layout>
