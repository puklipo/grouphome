<div x-data @page-updated.window="document.getElementById('home_index').scrollIntoView({behavior: 'smooth'})" id="home_index">
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
