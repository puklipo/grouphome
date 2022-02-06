<div>
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
