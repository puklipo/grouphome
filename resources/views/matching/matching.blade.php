<x-main-layout>
    <x-slot name="title">
        {{ __('グループホーム用の土地をマッチング') }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ __('グループホーム用の土地をマッチング') }}
            </x-slot>

            <x-slot name="description">
                グループホーム用の土地・建物を貸したい・売りたい所有者と探してる事業者をマッチング
            </x-slot>
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="px-3 sm:px-6 lg:px-8">
            <h1 class="text-4xl my-10">グループホーム用の土地・建物を貸したい・売りたい所有者と探してる事業者をマッチング</h1>

            <div class="prose dark:prose-invert prose-indigo prose-a:text-indigo-500 max-w-none">

                <p class="font-bold">ここでは情報を掲載しているだけなので直接問い合わせてください。</p>

                {{-- 手動で追加なので大量に掲載する予定はない --}}
                {{-- 掲載終了したら個別にitemを削除 --}}
                @includeIf('matching.item1', ['active' => true])
                @includeIf('matching.item1', ['active' => false])
            </div>
        </div>
    </div>
</x-main-layout>
