<div>
    <x-box-header class="mt-6">
        <x-slot name="left">
            費用
        </x-slot>
        <x-slot name="right">
            <time datetime="{{ $home->cost->updated_at }}"
                  title="{{ $home->cost->updated_at->toDateString() }}">
                {{ $home->cost->updated_at->diffForHumans() }}
            </time>更新
        </x-slot>
    </x-box-header>

    <x-box class="p-3">
        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">月額費用合計</div>
            <div class="text-lg">
                @if($home->cost->total > 0)
                    <span class="text-red-500 font-extrabold">{{ $home->cost->total }}円</span>
                    (家賃補助適用後 <span
                        class="text-red-500 font-extrabold">{{ $home->cost->total - $home->cost->support }}円</span>)
                @else
                    不明
                @endif
            </div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">家賃</div>
            <div class="text-lg">{{ $home->cost->rent }}円</div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">食費</div>
            <div class="text-lg">{{ $home->cost->food }}円</div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">水道・光熱費</div>
            <div class="text-lg">{{ $home->cost->utilities }}円</div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">日用品・雑費・共益費</div>
            <div class="text-lg">{{ $home->cost->daily }}円</div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">その他</div>
            <div class="text-lg">{{ $home->cost->etc }}円</div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">家賃補助</div>
            <div class="text-lg">{{ $home->cost->support }}円</div>
        </div>

        <div class="mb-3">
            <div class="border-b text-gray-500 dark:text-gray-200 text-sm">補足説明</div>
            <div class="text-lg">{{ $home->cost->message }}</div>
        </div>

    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit>
            <x-slot name="title">
                変更
            </x-slot>
            <form wire:submit.prevent="save">
                <div class="mb-3">数字はすべて0以上の数値・半角で入力してください。</div>

                <x-label for="rent" value="{{ __('家賃') }}"/>
                <x-input type="number" name="rent" wire:model.defer="home.cost.rent"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">家賃補助は含めない。</div>

                <x-label for="food" value="{{ __('食費') }}"/>
                <x-input type="number" name="food" wire:model.defer="home.cost.food"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">1ヶ月30日の場合の合計。（実費で目安がない時は仮で30000を入力）</div>

                <x-label for="utilities" value="{{ __('水道・光熱費') }}"/>
                <x-input type="number" name="utilities" wire:model.defer="home.cost.utilities"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">使用した分だけ実費精算でも平均値を入力して補足で説明。（目安がない時は10000）
                </div>

                <x-label for="daily" value="{{ __('日用品・雑費・共益費') }}"/>
                <x-input type="number" name="daily" wire:model.defer="home.cost.daily"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">日用品・雑費・共益費など。</div>

                <x-label for="etc" value="{{ __('その他') }}"/>
                <x-input type="number" name="etc" wire:model.defer="home.cost.etc"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">その他。</div>

                <x-label for="support" value="{{ __('家賃補助') }}"/>
                <x-input type="number" name="support" wire:model.defer="home.cost.support"></x-input>
                <x-input-error for="home.cost.support" />

                <div class="text-sm text-gray-500 dark:text-white mb-3">特定障害者特別給付費の1万円以外にも自治体独自の補助が利用できる場合は合計して入力。
                </div>

                <x-label for="message" value="{{ __('補足説明') }}"/>
                <x-input type="text" name="message" class="w-full"
                             wire:model.defer="home.cost.message"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">
                    食費の詳細（朝食、昼食、夕食ごとの費用）や光熱費の実費精算など説明が必要なことがあれば入力。
                </div>

                <x-label for="total" value="{{ __('費用合計') }}"/>
                <x-input type="number" name="total" wire:model.defer="home.cost.total"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">
                    月額費用の目安。家賃補助は含めない。光熱費を実費精算する場合でも平均的な費用で計算してすべての合計を入力。
                    <x-button wire:click="calcTotal">{{ __('他の項目から合計を自動計算') }}</x-button>
                </div>

                <x-button class="mt-3">
                    {{ __('更新') }}
                </x-button>
            </form>
        </x-box-edit>
    @endcanany
</div>
