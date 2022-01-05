@auth
    <div class="mt-6">
    <span class="bg-red-500 text-white px-6 py-1">
        事業者用
    </span>
    </div>
    <div class="border-4 border-red-500 p-3">
        @can('update', $home)
            管理中のグループホームなので空室状況などを直接編集できます。
        @else
            <form action="{{ route('operator.request', $home) }}" method="post">
                @csrf
                <x-jet-button class="ml-4 text-lg">
                    管理事業者として申請
                </x-jet-button>
            </form>
            <div class="p-3">承認後に管理できるようになります。</div>
        @endcan
    </div>
@endauth
