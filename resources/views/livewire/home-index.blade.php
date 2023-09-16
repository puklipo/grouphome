<div x-data @page-updated.window="$el.scrollIntoView({behavior: 'smooth'})">
    @isset($pref)
        <h1 class="p-3 font-semibold text-2xl leading-tight">
            {{ $pref->name . $area }} [{{ $this->homes->total() }}]
        </h1>
    @endisset

    <div class="p-3">
        {{ $this->homes->links() }}
    </div>

    @forelse($this->homes as $home)
        @include('homes.index-item')
    @empty
        <div class="p-3 font-bold">見つかりませんでした。</div>
    @endforelse

    <div class="p-3">
        {{ $this->homes->links() }}
    </div>
</div>
