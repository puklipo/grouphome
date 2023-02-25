<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg"
     wire:init="onReady">
    @if(session()->missing('mail_success'))

        <x-validation-errors class="mb-4"/>

        <form wire:submit.prevent="sendmail">
            <div>
                <x-label for="name" value="{{ __('お名前') }}"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="name" required
                             autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model.lazy="email"
                             required autocomplete="email"/>
            </div>

            <div class="mt-4">
                <x-label for="message" value="{{ __('メッセージ') }}"/>

                <textarea name="body"
                          wire:model.lazy="body"
                          class="w-full h-32 bg-white text-black border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                          required @auth() autofocus @endauth
                ></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('送信') }}
                </x-button>
            </div>
        </form>

    @else
        {{ __('お問い合わせありがとうございました。返信をお待ちください。') }}
    @endif
</div>

