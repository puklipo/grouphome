<div>
    <div class="border-4 border-gray-500 p-3 m-3">
        <h2 class="text-4xl font-bold my-3">詳細検索</h2>
        <p class="text-sm text-gray-700 mb-2 dark:text-gray-300">検索条件を変更するとすぐに表示が変わります。</p>

        <x-search.title>{{ __('キーワード検索') }}</x-search.title>

        <x-jet-input name="q" type="search"
                     class="block max-w-full text-black bg-white dark:bg-gray-800 dark:text-white"
                     wire:model.lazy="q"
                     placeholder="{{ 'キーワード検索' }}"
        />

        <x-search.title>{{ __('対象区分') }}</x-search.title>

        @foreach($levels as $index => $level)
            <div class="inline-block mb-2">
                <x-jet-label for="level_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="level_{{ $index }}"
                                    id="level_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="levels.{{ $index }}"/>
                    区分{{ $index === 0 ? 'なし' : $index }}以上
                </x-jet-label>
            </div>
        @endforeach

        <x-search.title>{{ __('サービス類型') }}</x-search.title>

        @foreach($types as $index => $type)
            <div class="inline-block mb-2">
                <x-jet-label for="type_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="type_{{ $index }}"
                                    id="type_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="types.{{ $index }}"/>
                    {{ Arr::get(config('type'), $index-1, '不明') }}
                </x-jet-label>
            </div>
        @endforeach

        <x-search.title>{{ __('共有設備') }}</x-search.title>

        @foreach($facilities as $index => $facility)
            <div class="inline-block mb-2">
                <x-jet-label for="facility_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="facility_{{ $index }}"
                                    id="facility_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="facilities.{{ $index }}"/>
                    {{ config('facility.'.$index) }}
                </x-jet-label>
            </div>
        @endforeach

        <x-search.title>{{ __('居室設備') }}</x-search.title>

        @foreach($equipments as $index => $equipment)
            <div class="inline-block mb-2">
                <x-jet-label for="equipment_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="equipment_{{ $index }}"
                                    id="equipment_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="equipments.{{ $index }}"/>
                    {{ config('equipment.'.$index) }}
                </x-jet-label>
            </div>
        @endforeach

        <x-search.title>{{ __('空室') }}</x-search.title>

        <x-select name="vacancy" wire:model="vacancy">
            <option value="">指定しない</option>
            <option value="0">{{ __('空室あり') }}</option>
            <option value="1">{{ __('満室') }}</option>
        </x-select>

        <x-search.title>{{ __('都道府県') }}</x-search.title>

        <x-select name="pref_id" wire:model="pref_id">
            <option value="">指定しない</option>
            @foreach(\App\Models\Pref::oldest('id')->get() as $pre)
                <option value="{{ $pre->id }}">{{ $pre->name }}</option>
            @endforeach
        </x-select>

        @if(count($areas ?? []) > 0)
            <x-select name="area" wire:model="area">
                <option value="">指定しない</option>
                @foreach($areas as $area_name)
                    <option value="{{ $area_name }}">{{ $area_name }}</option>
                @endforeach
            </x-select>
        @endif

        <x-search.title>{{ __('並べ替え') }}</x-search.title>

        <x-select name="sort" wire:model="sort">
            <option value="">なし</option>
            <option value="updated">更新が新しい順</option>
            <option value="low">費用が安い順</option>
            <option value="high">費用が高い順</option>
            <option value="address">住所</option>
            <option value="release">指定年月日(新着順)</option>
            <option value="name">グループホーム名</option>
            <option value="pref">都道府県(北から)</option>
            <option value="id">事業所番号(降順)</option>
        </x-select>
    </div>

    <div wire:loading.class="opacity-50">
        @includeIf('livewire.home-index')
    </div>
</div>
