<div>
    <div class="mt-6 flex justify-between">
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
            ハウスルール
        </span>
    </div>
    <div class="border-4 border-indigo-500 p-3 dark:border-gray-800">
        @if(filled($home->houserule))
            <div class="text-md">{!! nl2br(e($home->houserule)) !!}</div>
        @endif
    </div>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <span class="bg-red-500 text-white px-6 pb-1">
                変更
            </span>
            <div class="border-4 border-red-500 p-3">
                <form wire:submit.prevent="save">

                    <x-jet-label for="houserule" value="{{ __('入居者向けのルール') }}"/>
                    <textarea name="houserule" rows="4" cols="40" wire:model.defer="home.houserule"
                              class="mt-1 block w-full bg-white text-black border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>

                    <div class="text-sm text-gray-500 dark:text-white">「日中は必ず外出」や門限など入居者向けの細かいルールを入力してください。</div>

                    <x-jet-button class="mt-3">
                        {{ __('更新') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    @endcanany
</div>
