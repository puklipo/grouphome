<div>
    <div class="mt-6">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        居室設備
    </span>
    </div>
    <div class="border-4 border-indigo-500 p-3 dark:border-gray-800 flex flex-wrap">
        @foreach(config('equipment') as $key => $name)
            <x-rounded-tag :enabled="$home->equipment->$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </div>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <span class="bg-red-500 text-white px-6 pb-1">
                変更
            </span>
            <div class="border-4 border-red-500 p-3 flex flex-wrap">
                @foreach(config('equipment') as $key => $name)
                    <x-jet-label for="equipment_{{ $key }}" class="mr-3 cursor-pointer">
                        <x-jet-checkbox name="equipment_{{ $key }}"
                                        id="equipment_{{ $key }}"
                                        class="checked:text-red-500"
                                        wire:model="home.equipment.{{ $key }}"/>
                        {{ $name }}
                    </x-jet-label>
                @endforeach
            </div>
        </div>
    @endcanany
</div>
