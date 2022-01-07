<x-main-layout>
    <x-slot name="title">
        {{ __('お問い合わせ') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('お問い合わせ') }}
        </h1>
    </x-slot>

    <div class="py-3">
        <div class="sm:px-6 lg:px-8">
            <livewire:contact-form/>
        </div>
    </div>
</x-main-layout>
