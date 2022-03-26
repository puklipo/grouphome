<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg"
>
    @if(session()->missing('mail_success'))

        <x-jet-validation-errors class="mb-4"/>

        <form wire:submit.prevent="sendmail">
            <p class="mb-2 text-lg text-red-500 dark:text-gray-300">
                メールアドレスの入力ミスを防ぐため、最初にあなたのメールアドレスを入力してください。問い合わせフォームはメールで送られます。</p>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model.lazy="email"
                             required autofocus autocomplete="email"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('送信') }}
                </x-jet-button>
            </div>
        </form>

    @else
        {{ __('フォームのURLを送信しました。メールを確認してください。') }}
    @endif
</div>
