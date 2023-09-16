<div
    x-data
    x-init="if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition((position) => {
                    $wire.load(position.coords.latitude, position.coords.longitude)
                }, () => $wire.set('geo', false))
            }
            ">

    @forelse($this->homes as $home)
        @include('homes.index-item')
    @empty
        <div class="p-3 font-bold">表示中...しばらく待っても表示されないときはブラウザを再読み込みしてください。</div>

        @unless($geo)
            <div class="p-3 font-bold text-red-500">ブラウザで位置情報へのアクセスを許可してください。</div>
        @endunless
    @endforelse

</div>
