<div>
    <x-box-header class="mt-6">
        <x-slot name="left">
            入居者向けのルール
        </x-slot>
    </x-box-header>

    <x-box class="p-3">
        @if(filled($home->houserule))
            <div class="text-md">{!! nl2br(e($home->houserule)) !!}</div>
        @endif
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit>
            <x-slot name="title">
                変更
            </x-slot>
            <form wire:submit.prevent="save">
                <x-label for="houserule" value="{{ __('入居者向けのルール') }}"/>
                <x-textarea name="houserule" wire:model.defer="home.houserule"></x-textarea>

                <div class="text-sm text-gray-500 dark:text-white">「日中は必ず外出」や門限など入居者向けの細かいルールを入力してください。</div>

                <x-button class="mt-3">
                    {{ __('更新') }}
                </x-button>
            </form>
        </x-box-edit>
    @endcanany
</div>
