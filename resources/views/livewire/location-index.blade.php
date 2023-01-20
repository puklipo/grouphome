<div
    x-data
    x-init="if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition((position) => {
                    $wire.set('latitude', position.coords.latitude)
                    $wire.set('longitude', position.coords.longitude)
                    $wire.set('geo', true)
                })
                $wire.set('loading', false)
            }
            ">

    @forelse($homes as $home)
        @include('homes.index-item')
    @empty
        @unless($loading)
            <div class="p-3 font-bold">見つかりませんでした。</div>

            @unless($geo)
                <div class="p-3 font-bold text-red-500">ブラウザで位置情報へのアクセスを許可してください。</div>
            @endunless
        @endunless
    @endforelse

</div>
