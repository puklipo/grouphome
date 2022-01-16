<div class="m-3">
    <a wire:click="$set('showModal', true)">
        <div class="relative w-64 h-40 bg-contain bg-no-repeat bg-center cursor-pointer"
             style="background-image: url({{ Storage::exists($origin) ? Storage::url($origin): 'https://placehold.jp/707070/ffffff/250x150.png?text=NO%20PHOTO' }})">

            <div class="w-full mt-0 font-bold bg-white/80 dark:bg-black/50 p-2">
                {{ $name }}
            </div>
        </div>
    </a>
    <x-jet-modal wire:model="showModal">
        <div class="p-3">
            <h3 class="text-black text-center">{{ $name }}</h3>

            <img class="mx-auto drop-shadow-lg m-3"
                 src="{{ Storage::exists($origin) ? Storage::url($origin): 'https://placehold.jp/707070/ffffff/250x150.png?text=NO%20PHOTO' }}" alt="{{ $name }}">
        </div>
    </x-jet-modal>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <div class="border-2 border-red-500 p-3">
                <form wire:submit.prevent="save">
                    <div>
                        <x-jet-input type="file" id="photo" wire:model="photo"/>
                        <x-jet-input-error for="photo" class="mt-2"/>
                    </div>

                    <x-jet-button class="mt-3" wire:loading.attr="disabled">
                        {{ __('アップロード') }}
                    </x-jet-button>
                </form>

                @if(Storage::exists($origin))
                    <div class="text-right">
                        <x-jet-danger-button class="mt-3" wire:click="delete" wire:loading.attr="disabled">
                            {{ __('写真を削除') }}
                        </x-jet-danger-button>
                    </div>
                @endif
            </div>
        </div>
    @endcanany
</div>
