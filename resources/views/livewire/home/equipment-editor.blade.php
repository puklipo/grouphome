<div>
    <x-box-header class="mt-6">
        <x-slot name="left">
            居室設備
        </x-slot>
        <x-slot name="right">
            <time datetime="{{ $home->equipment->updated_at }}"
                  title="{{ $home->equipment->updated_at->toDateString() }}">
                {{ $home->equipment->updated_at->diffForHumans() }}
            </time>更新
        </x-slot>
    </x-box-header>

    <x-box class="p-3 flex flex-wrap">
        @foreach(config('equipment') as $key => $name)
            <x-rounded-tag :enabled="$home->equipment->$key" :icon="$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit class="flex flex-wrap">
            <x-slot name="title">
                変更
            </x-slot>
            @foreach(config('equipment') as $key => $name)
                <x-label for="equipment_{{ $key }}" class="mr-3 cursor-pointer">
                    <x-checkbox name="equipment_{{ $key }}"
                                    id="equipment_{{ $key }}"
                                    class="checked:text-red-500"
                                    wire:model="home.equipment.{{ $key }}"/>
                    {{ $name }}
                </x-label>
            @endforeach
        </x-box-edit>
    @endcanany
</div>
