<div>
    <div class="mt-6 flex justify-between">
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
            最新の空室情報
        </span>
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white dark:hover:text-gray-500">
            <time datetime="{{ $home->vacancy->updated_at }}">
                {{ $home->vacancy->updated_at->diffForHumans() }}
            </time>
        </span>
    </div>
    <div class="border-4 border-indigo-500 p-3 dark:border-gray-800">
        <x-rounded-tag :enabled="true">{{ $home->vacancy->filled ? __('満室') : __('空室あり') }}</x-rounded-tag>

        @if(filled($home->vacancy->message))
            <div class="p-3 text-lg">{!! nl2br(e($home->vacancy->message)) !!}</div>
        @endif
    </div>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <span class="bg-red-500 text-white px-6 pb-1">
                変更
            </span>
            <div class="border-4 border-red-500 p-3">
                <form wire:submit.prevent="save">

                    <x-jet-label for="vacancy_filled" class="mb-3 cursor-pointer">
                        <x-jet-checkbox name="vacancy_filled"
                                        id="vacancy_filled"
                                        class="checked:text-red-500"
                                        wire:model.defer="home.vacancy.filled"/>
                        {{ __('満室') }}
                    </x-jet-label>

                    <x-jet-label for="vacancy_message" value="{{ __('メッセージ') }}"/>
                    <textarea name="vacancy_message" rows="4" cols="40" wire:model.defer="home.vacancy.message"
                              class="mt-1 block w-full bg-white text-black border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                    <x-jet-input-error for="vacancy_message" class="mt-3"/>

                    <x-jet-button class="mt-3">
                        {{ __('更新') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    @endcanany
</div>
