<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
    @if(session()->missing('mail_success'))

        <x-validation-errors class="mb-4"/>

        <form wire:submit.prevent="sendmail">
            <div>
                <x-label for="name" value="{{ __('お名前') }}"/>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="name" required autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full disabled:text-gray-500" type="email" name="email" wire:model.lazy="email"
                             required disabled/>
            </div>

            <div class="mt-4">
                <x-label for="tel" value="{{ __('電話番号（省略可）') }}"/>
                <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" wire:model.lazy="tel"/>
            </div>

            <div class="mt-4">
            <x-label for="subject" value="{{ __('ご用件') }}"/>

            <x-select name="subject" wire:model.lazy="subject">
                <option value="見学">見学</option>
                <option value="質問">質問</option>
                <option value="空き状況の確認">空き状況の確認</option>
                <option value="その他">その他</option>
            </x-select>
            </div>

            <div class="mt-4">
                <x-label for="body" value="{{ __('お問い合わせ内容') }}"/>

                <textarea name="body"
                          wire:model.lazy="body"
                          class="w-full h-32 bg-white text-black border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                          required
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

