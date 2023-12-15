@guest
    @if($home->users()->doesntExist())
        <div class="print:hidden">
            <div class="border-2 border-red-500 p-3">
                グループホームの詳細情報を入力するには
                <a href="{{ route('help.operator') }}"
                   class="text-indigo-500 underline" wire:navigate>事業者向けの使い方</a>
                を確認してください。
            </div>
        </div>
    @endif
@endguest
