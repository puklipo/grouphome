@if($home->users()->exists())
    <div class="relative">
        <div
            class="flex flex-row space-x-4 fixed bottom-1 sm:bottom-5 right-1 sm:right-5 bg-gray-500 p-6 bg-opacity-30 shadow-lg rounded-md print:hidden">

            <div
                class="text-lg bg-emerald-500 text-white dark:bg-white dark:text-gray-900 p-3 font-bold shadow-lg rounded-lg">
                <a href="{{ route('home.mail.prepare', $home) }}" rel="nofollow">
                    <x-icon.mail class="inline dark:stroke-red-500"/>
                    メールで問い合わせる</a>
            </div>

            <div
                class="text-lg bg-orange-500 text-white dark:bg-gray-900 dark:text-white p-3 font-bold shadow-lg rounded-lg">
                <a href="tel:{{ $home->tel }}">
                    <x-icon.phone class="inline dark:stroke-indigo-500"/>
                    電話で問い合わせる</a>
            </div>
        </div>
    </div>
@endif
