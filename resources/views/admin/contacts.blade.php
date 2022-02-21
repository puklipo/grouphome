<x-main-layout>
    <x-slot name="title">
        {{ __('お問い合わせ一覧') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('お問い合わせ一覧') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:admin.contacts-index></livewire:admin.contacts-index>
        </div>
    </div>
</x-main-layout>
