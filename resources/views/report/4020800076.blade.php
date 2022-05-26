<x-main-layout>
    <x-slot name="title">
        体験レポート スターホーム六本松（福岡県福岡市中央区）
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            体験レポート スターホーム六本松（福岡県福岡市中央区）
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-3 sm:px-6 lg:px-8">
            <a href="{{ route('home.show', $report) }}" class="text-indigo-500 dark:text-white hover:underline">戻る</a>

            <nav class="m-6">
                <ul>
                    <li><a href="#2022_05" class="text-indigo-500 hover:underline">2022年5月</a></li>
                </ul>
            </nav>

            <article id="2022_05" class="ring-4 ring-indigo-500">
                <h3 class="text-2xl bg-indigo-500 text-white p-3">2022年5月</h3>
                <div class="p-6 prose prose-indigo">
                    test
                </div>
            </article>

        </div>
    </div>
</x-main-layout>
