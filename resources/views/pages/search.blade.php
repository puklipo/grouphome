<?php
use function Laravel\Folio\name;

name('detail-search');
?>

<x-main-layout>
    <x-slot name="title">
        {{ __('詳細検索') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('詳細検索') }}
        </h1>
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ __('詳細検索') }}
            </x-slot>

            <x-slot name="description">
                {{ __('詳細検索') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <livewire:detail-search/>
        </div>
    </div>
</x-main-layout>
