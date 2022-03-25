@guest
    @if($home->users()->count() === 0)
        <div class="print:hidden">
            <div class="mt-6">
            <span class="bg-red-500 text-white px-3 py-1 font-bold">
                グループホーム事業者からの情報を募集しています
            </span>
            </div>
            <div class="border-4 border-red-500 p-3">
                グループホームの詳細情報を入力するには
                <a href="{{ route('contact') }}"
                   class="text-indigo-500 underline">問い合わせ</a>
                から連絡してください。
            </div>
        </div>
    @endif
@endguest
