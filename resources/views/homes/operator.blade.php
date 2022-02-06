@auth
    <div class="mt-6">
    <span class="bg-red-500 text-white px-6 py-1">
        事業者用
    </span>
    </div>
    <div class="border-4 border-red-500 p-3">
        @can('update', $home)
            管理中のグループホームなので設備情報、空室状況などを直接変更できます。変更することが少ない基本情報はここでは変更できないので<a href="https://www.wam.go.jp/sfkohyoout/" target="_blank"
            class="text-indigo-500 underline">WAM</a>の登録情報を変更してください。
        @else
            <form action="{{ route('operator.request', $home) }}" method="post">
                @csrf
                <x-jet-button class="text-lg">
                    管理事業者として申請
                </x-jet-button>
            </form>
            <div class="pt-3">承認後に管理できるようになります。</div>
        @endcan
    </div>
@endauth
