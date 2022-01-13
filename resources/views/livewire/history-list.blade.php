<div wire:init="ready">
    @unless($ready)
        <div class="p-3 animate-pulse">
            履歴を表示しています…
        </div>
    @endunless

    @foreach($homes as $home)
        @include('homes.index-item')
    @endforeach
</div>
