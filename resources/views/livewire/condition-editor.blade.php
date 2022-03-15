<div>
    <div class="mt-6 flex justify-between">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        利用条件
    </span>
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white">
            <time datetime="{{ $home->condition->updated_at }}"
                  title="{{ $home->condition->updated_at->toDateString() }}">
                {{ $home->condition->updated_at->diffForHumans() }}
            </time>更新
        </span>
    </div>
    <x-box class="p-3 flex flex-wrap">
        <x-rounded-tag>
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
        <div class="mt-0">
            <span class="bg-red-500 text-white px-6 pb-1">
                変更
            </span>
            <div class="border-4 border-red-500 p-3">
                <div class="mb-6">
                    <x-jet-label for="level" value="{{ __('対象区分の下限') }}" class="mt-3"/>

                    <select name="level"
                            wire:model="home.level"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm flex-auto dark:bg-gray-800">
                        <option value="0">区分なし以上</option>
                        @foreach(range(1, 6) as $level)
                            <option value="{{ $level }}">区分{{ $level }}以上</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <x-jet-label for="type_id" value="{{ __('サービス類型') }}" class="mt-3"/>

                    <select name="type_id"
                            wire:model="home.type_id"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm flex-auto dark:bg-gray-800">
                        <option value="">不明</option>

                        @foreach(\App\Models\Type::all() as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-wrap">

                    @foreach(config('condition') as $key => $name)
                        <x-jet-label for="condition_{{ $key }}" class="mr-3 cursor-pointer">
                            <x-jet-checkbox name="condition_{{ $key }}"
                                            id="condition_{{ $key }}"
                                            class="checked:text-red-500"
                                            wire:model="home.condition.{{ $key }}"/>
                            {{ $name }}
                        </x-jet-label>
                    @endforeach
                </div>
            </div>
        </div>
    @endcanany
</div>
