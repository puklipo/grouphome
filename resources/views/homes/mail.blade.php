<div class="relative">
    <div
        class="flex flex-row space-x-4 fixed bottom-5 right-5 bg-gray-500 p-6 bg-opacity-40 shadow-lg rounded-md print:hidden">

        <div class="text-lg bg-red-500 text-white p-3 font-bold shadow-lg rounded-lg hidden">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                メールで問い合わせる</a>
        </div>

        @isset($home->tel)
            <div class="text-lg bg-orange-500 text-white p-3 font-bold shadow-lg rounded-lg">
                <a href="tel:{{ $home->tel }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    電話で問い合わせる</a>
            </div>
        @endisset
    </div>
</div>


