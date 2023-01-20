<div
    x-data
    x-init="if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition((position) => {
                    $wire.load(position.coords.latitude, position.coords.longitude)
                }, () => $wire.set('geo', false))
            }
            ">

    @forelse($homes as $home)
        @include('homes.index-item')
    @empty
        @unless($geo)
            <div class="p-3 font-bold text-red-500">ブラウザで位置情報へのアクセスを許可してください。</div>
        @endunless
    @endforelse

</div>
