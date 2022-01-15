<div>
    <div class="mt-6">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        利用条件
    </span>
    </div>
    <div class="border-4 border-indigo-500 p-3 dark:border-gray-800 flex flex-wrap">
        <x-rounded-tag>
            @if($home->level > 0)
                区分 {{ $home->level }} 以上
            @else
                区分なし以上(もしくは情報なし)
            @endif
        </x-rounded-tag>

        @isset($home->type)
            <x-rounded-tag>{{ $home->type->type }}</x-rounded-tag>
        @endisset

        @foreach(config('condition') as $key => $name)
            <x-rounded-tag :enabled="$home->condition->$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </div>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <span class="bg-red-500 text-white px-6 pb-1">
                変更
            </span>
            <div class="border-4 border-red-500 p-3 flex flex-wrap">
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
    @endcanany
</div>
