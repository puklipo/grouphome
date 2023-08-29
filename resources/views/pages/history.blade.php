<?php
use function Laravel\Folio\name;

name('history');
?>

<x-main-layout>
    <x-slot name="title">
        {{ __('履歴') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('履歴') }} [{{ collect(session('history', []))->count() }}]
        </h1>
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ __('履歴') }} | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ config('app.name') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <livewire:history-list lazy/>

        </div>
    </div>
</x-main-layout>
