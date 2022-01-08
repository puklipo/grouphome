<div class="mt-6">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        利用条件
    </span>
</div>
<div class="border-4 border-indigo-500 p-3 dark:border-gray-800 flex flex-wrap">
    <x-rounded-tag>
        対象区分
        @if($home->level > 0)
            {{ $home->level }} 以上
        @else
            区分なし以上(もしくは情報なし)
        @endif
    </x-rounded-tag>

    @isset($home->type)
        <x-rounded-tag>{{ $home->type->type }}</x-rounded-tag>
    @endisset

    @if($home->trial)
        <x-rounded-tag>{{ __('体験利用必須') }}</x-rounded-tag>
    @endif
</div>
