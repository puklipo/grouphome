<x-box-header class="mt-3 mb-0">
    <x-slot name="left">
        <a href="{{ route('pref', $home->pref) }}" class="dark:hover:text-gray-300" wire:navigate>
            {{ $home->pref->name }}
        </a>
    </x-slot>
    @if(filled($home->area))
        <x-slot name="right">
            <a href="{{ route('pref', [$home->pref, $home->area]) }}" class="dark:hover:text-gray-300" wire:navigate>
                {{ $home->area }}
            </a>
        </x-slot>
    @endif
</x-box-header>
