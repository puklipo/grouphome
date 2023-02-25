@auth
    <div class="mt-6 print:hidden">
        <x-box-edit>
            <x-slot name="title">
                事業者用
            </x-slot>
            @can('update', $home)
                管理中のグループホームなので設備情報、空室状況などを直接変更できます。変更することが少ない基本情報はここでは変更できないので<a
                    href="https://www.wam.go.jp/sfkohyoout/"
                    target="_blank"
                    class="text-indigo-500 underline">WAM</a>の登録情報を変更してください。
            @else
                <form action="{{ route('operator.request', $home) }}" method="post">
                    @csrf
                    <x-button class="text-lg">
                        管理事業者として申請
                    </x-button>
                </form>
                <div class="pt-3">承認後に管理できるようになります。</div>
            @endcan
        </x-box-edit>
    </div>
@endauth
