<div class="print:hidden">
    <x-box-header class="mt-6">
        <x-slot name="left">
            写真
        </x-slot>
        @if(filled($home->photo->updated_at))
            <x-slot name="right">
                <time datetime="{{ $home->photo->updated_at }}"
                      title="{{ $home->photo->updated_at->toDateString() }}">
                    {{ $home->photo->updated_at->diffForHumans() }}
                </time>
                更新
            </x-slot>
        @endif
    </x-box-header>

    <x-box class="flex flex-wrap">
        @foreach(config('photo') as $column => $name)
            <livewire:photo-editor :home="$home" :origin="$home->photo->$column ?? ''" :column="$column" :name="$name"/>
        @endforeach
    </x-box>
</div>
