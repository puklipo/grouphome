<x-main-layout>
    <x-slot name="title">
        {{ $home->name . __('へのお問い合わせ') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ $home->name . __('へのお問い合わせ') }}
        </h1>
    </x-slot>

    <div class="py-3">
        <div class="sm:px-6 lg:px-8">
            <x-breadcrumbs-back/>

            <livewire:mail.form :home="$home" :email="$mail"/>
        </div>
    </div>
</x-main-layout>
