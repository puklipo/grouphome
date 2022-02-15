<div x-data @page-updated.window="window.scrollTo({top: 0, behavior: 'smooth'})">
    @isset($pref)
        <h1 class="p-3 font-semibold text-2xl leading-tight">
            {{ $pref->name . $area }} [{{ $homes->total() }}]
        </h1>
    @endisset

    <div class="p-3">
        {{ $homes->links() }}
    </div>

    @forelse($homes as $home)
        @include('homes.index-item')
    @empty
        <div class="p-3 font-bold">見つかりませんでした。</div>
    @endforelse

    <div class="p-3">
        {{ $homes->links() }}
    </div>
</div>
