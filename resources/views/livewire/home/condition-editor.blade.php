<div>
    <x-box-header class="mt-6">
        <x-slot name="left">
            利用条件
        </x-slot>
        <x-slot name="right">
            <time datetime="{{ $home->condition->updated_at }}"
                  title="{{ $home->condition->updated_at->toDateString() }}">
                {{ $home->condition->updated_at->diffForHumans() }}
            </time>更新
        </x-slot>
    </x-box-header>

    <x-box class="p-3 flex flex-wrap">
        <x-rounded-tag :enabled="true">
            @if($home->level > 0)
                区分 {{ $home->level }} 以上
            @else
                区分なし以上
            @endif
        </x-rounded-tag>

        <x-rounded-tag :enabled="filled($home->type)">{{ $home->type->type ?? 'サービス類型不明' }}</x-rounded-tag>

        @foreach(config('condition') as $key => $name)
            <x-rounded-tag :enabled="$home->condition->$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit>
            <x-slot name="title">
                変更
            </x-slot>
            <div class="mb-6">
                <x-label for="level_min" value="{{ __('対象区分の下限') }}" class="mt-3"/>

                <select name="level"
                        id="level_min"
                        wire:model.live="level"
                        class="border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200/5 rounded-md shadow-xs flex-auto dark:bg-gray-800">
                    <option value="0">区分なし以上</option>
                    @foreach(range(1, 6) as $level)
                        <option value="{{ $level }}">区分{{ $level }}以上</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <x-label for="type_id" value="{{ __('サービス類型') }}" class="mt-3"/>

                <select name="type_id"
                        id="type_id"
                        wire:model.live="type_id"
                        class="border-gray-300 focus:border-indigo-300 focus:ring-3 focus:ring-indigo-200/5 rounded-md shadow-xs flex-auto dark:bg-gray-800">
                    <option value="">不明</option>

                    @foreach(\App\Models\Type::all() as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-wrap">

                @foreach(config('condition') as $key => $name)
                    <x-label for="condition_{{ $key }}" class="mr-3 cursor-pointer">
                        <x-checkbox name="condition_{{ $key }}"
                                        id="condition_{{ $key }}"
                                        class="checked:text-red-500"
                                        wire:model.live="condition.{{ $key }}"/>
                        {{ $name }}
                    </x-label>
                @endforeach
            </div>
        </x-box-edit>
    @endcanany
</div>
