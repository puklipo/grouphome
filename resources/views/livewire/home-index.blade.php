<div id="home">
    @isset($pref)
        <h1 class="p-3 font-semibold text-2xl leading-tight">
            {{ $pref->name . $area }}
        </h1>
    @endisset

    <div class="p-3">
        {{ $this->homes->links(data: ['scrollTo' => '#home']) }}
    </div>

    @forelse($this->homes as $home)
        @include('homes.index-item')
    @empty
        <div class="p-3 font-bold">見つかりませんでした。</div>
    @endforelse

    <div class="p-3">
        {{ $this->homes->links(data: ['scrollTo' => '#home']) }}
    </div>
</div>
