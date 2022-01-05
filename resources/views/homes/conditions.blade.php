<div class="mt-6">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        利用条件
    </span>
</div>
<div class="border-4 border-indigo-500 p-3 dark:border-gray-800">
    <div class="text-md my-3">対象区分
        @if($home->level > 0)
            {{ $home->level }} 以上
        @else
            区分なし以上、もしくは情報なし。
        @endif
    </div>

    @isset($home->type)
        <div class="text-md my-3">{{ $home->type->type }}</div>
    @endisset

    @if($home->trial)
        <div class="text-md my-3">体験利用必須</div>
    @endif
</div>
