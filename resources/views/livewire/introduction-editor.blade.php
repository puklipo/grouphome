<div>
    <div class="mt-6 flex justify-between">
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
            {{ __('紹介') }}
        </span>
    </div>
    <x-box class="p-3">
        @if(filled($home->introduction))
            <div class="text-lg">{!! nl2br(e($home->introduction)) !!}</div>
        @endif
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit>
            <x-slot name="title">
                変更
            </x-slot>
            <form wire:submit.prevent="save">
                <x-jet-label for="introduction" value="{{ __('紹介') }}"/>

                <x-textarea name="introduction" wire:model.defer="home.introduction"></x-textarea>

                <div class="text-sm text-gray-500 dark:text-white">グループホームの基本的な紹介文を入力してください。</div>

                <x-jet-button class="mt-3">
                    {{ __('更新') }}
                </x-jet-button>
            </form>
        </x-box-edit>
    @endcanany
</div>
