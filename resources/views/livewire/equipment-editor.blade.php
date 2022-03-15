<div>
    <div class="mt-6 flex justify-between">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        居室設備
    </span>
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white">
            <time datetime="{{ $home->equipment->updated_at }}"
                  title="{{ $home->equipment->updated_at->toDateString() }}">
                {{ $home->equipment->updated_at->diffForHumans() }}
            </time>更新
        </span>
    </div>
    <x-box class="p-3 flex flex-wrap">
        @foreach(config('equipment') as $key => $name)
            <x-rounded-tag :enabled="$home->equipment->$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit class="flex flex-wrap">
            <x-slot name="title">
                変更
            </x-slot>
            @foreach(config('equipment') as $key => $name)
                <x-jet-label for="equipment_{{ $key }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="equipment_{{ $key }}"
                                    id="equipment_{{ $key }}"
                                    class="checked:text-red-500"
                                    wire:model="home.equipment.{{ $key }}"/>
                    {{ $name }}
                </x-jet-label>
            @endforeach
        </x-box-edit>
    @endcanany
</div>
