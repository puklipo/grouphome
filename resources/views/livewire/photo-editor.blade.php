<div class="m-3">

    <div class="relative w-64 h-40 bg-contain bg-no-repeat bg-center"
         style="background-image: url({{ Storage::exists($origin) ? Storage::url($origin): 'https://placehold.jp/707070/ffffff/250x150.png?text=NO%20PHOTO' }})">

        <div class="w-full mt-0 font-bold bg-white/30 backdrop-opacity-30 p-2">
            {{ $name }}
        </div>
    </div>

    @canany(['update', 'admin'], $home)
    <div class="mt-0">
        <div class="border-2 border-red-500 p-3">
            <form wire:submit.prevent="save">
                <div>
                    <x-jet-input type="file" wire:model="photo"/>
                </div>

                <x-jet-button class="mt-3">
                    {{ __('アップロード') }}
                </x-jet-button>
            </form>

            <div class="text-right">
            <x-jet-danger-button class="mt-3" wire:click="delete">
                {{ __('写真を削除') }}
            </x-jet-danger-button>
        </div>
        </div>
    </div>
    @endcanany


</div>
