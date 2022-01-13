<div wire:init="ready">
    <div class="p-3" wire:loading>
        履歴を表示しています…
    </div>

    @foreach($homes as $home)
        @include('homes.index-item')
    @endforeach
</div>
