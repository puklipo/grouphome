<?php
use function Laravel\Folio\name;

name('location');
?>

<x-main-layout>
    <x-slot name="title">
        {{ __('現在地から探す') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('近くのグループホーム') }}
        </h1>
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ __('近くのグループホーム') }} | {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ __('現在地から近いグループホームを探す') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <x-breadcrumbs-back/>

            <livewire:location-index></livewire:location-index>

        </div>
    </div>
</x-main-layout>
