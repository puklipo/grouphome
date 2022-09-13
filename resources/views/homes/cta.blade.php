@guest
    @if($home->users()->doesntExist())
        <div class="print:hidden">
            <div class="mt-6">
            <span class="bg-red-500 text-white px-3 py-1 font-bold">
                グループホーム事業者からの情報を募集しています
            </span>
            </div>
            <div class="border-4 border-red-500 p-3">
                グループホームの詳細情報を入力するには
                <a href="{{ route('help.operator') }}"
                   class="text-indigo-500 underline">事業者向けの使い方</a>
                を確認してください。
            </div>
        </div>
    @endif
@endguest
