<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg"
>
    @if(session()->missing('mail_success'))

        <x-validation-errors class="mb-4"/>

        <form wire:submit="sendmail">
            <p class="mb-2 text-lg text-red-500">
                メールアドレスの入力ミスを防ぐため、最初にあなたのメールアドレスを入力してください。問い合わせフォームはメールで届きます。</p>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model.blur-sm="email"
                             required autofocus autocomplete="email"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('送信') }}
                </x-button>
            </div>
        </form>

    @else
        {{ __('フォームのURLを送信しました。メールを確認してください。') }}
    @endif
</div>
