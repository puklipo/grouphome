<x-main-layout>
    <x-slot name="title">
        {{ __('お問い合わせ') }}
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <h1 class="text-4xl mt-10">{{ __('お問い合わせ') }}</h1>

            <livewire:contact-form/>

        </div>
    </div>
</x-main-layout>
