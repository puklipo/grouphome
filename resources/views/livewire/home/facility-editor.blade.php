<div>
    <x-box-header class="mt-6">
        <x-slot name="left">
            共有設備
        </x-slot>
        <x-slot name="right">
            <time datetime="{{ $home->facility->updated_at }}"
                  title="{{ $home->facility->updated_at->toDateString() }}">
                {{ $home->facility->updated_at->diffForHumans() }}
            </time>更新
        </x-slot>
    </x-box-header>

    <x-box class="p-3 flex flex-wrap">
        @foreach(config('facility') as $key => $name)
            <x-rounded-tag :enabled="$home->facility->$key" :icon="$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit class="flex flex-wrap">
            <x-slot name="title">
                変更
            </x-slot>
            @foreach(config('facility') as $key => $name)
                <x-jet-label for="facility_{{ $key }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="facility_{{ $key }}"
                                    id="facility_{{ $key }}"
                                    class="checked:text-red-500"
                                    wire:model="home.facility.{{ $key }}"/>
                    {{ $name }}
                </x-jet-label>
            @endforeach
        </x-box-edit>
    @endcanany
</div>
