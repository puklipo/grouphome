<div class="m-3">
    <a wire:click="$set('showModal', true)">
        <div class="relative w-64 h-40 bg-contain bg-no-repeat bg-center cursor-pointer hover:opacity-80"
             style="background-image: url({{ filled($origin) && Storage::exists($origin) ? Storage::url($origin): config('grouphome.no_photo') }})">

            <div class="w-full mt-0 font-bold bg-white/80 dark:bg-black/50 p-2">
                {{ $name }}
            </div>
        </div>
    </a>
    <x-modal wire:model="showModal">
        <div class="p-3">
            <h3 class="text-black text-center">{{ $name }}</h3>

            <img class="mx-auto drop-shadow-lg m-3"
                 src="{{ filled($origin) && Storage::exists($origin) ? Storage::url($origin): config('grouphome.no_photo') }}"
                 alt="{{ $name }}">
        </div>
    </x-modal>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <div class="border-2 border-red-500 p-3">
                <form wire:submit.prevent="save">
                    <div>
                        <x-input type="file" id="photo" wire:model="photo"/>
                        <x-input-error for="photo" class="mt-2"/>
                    </div>

                    <x-button class="mt-3" wire:loading.attr="disabled">
                        {{ __('アップロード') }}
                    </x-button>
                </form>

                @if(filled($origin) && Storage::exists($origin))
                    <div class="text-right">
                        <x-danger-button class="mt-3" wire:click="delete" wire:loading.attr="disabled">
                            {{ __('写真を削除') }}
                        </x-danger-button>
                    </div>
                @endif
            </div>
        </div>
    @endcanany
</div>
