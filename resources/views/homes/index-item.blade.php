<div class="m-3" wire:key="{{ $home->id }}">
    @include('homes.header')

    <x-box>

        @include('homes.cover')

        <div class="p-3">
            @if(isset($home->distance) && filled($home->distance))
                <div class="mb-3">
                    現在地から約{{ round($home->distance) }}メートル
                </div>
            @endif

            <a href="{{ route('home.show', $home) }}">
                <h2 class="inline-flex text-5xl text-indigo-500 dark:text-white font-extrabold tracking-widest hover:text-indigo-600 dark:hover:text-white dark:hover:underline">
                    <ruby>
                        {{ $home->name ?? '' }}
                        <rp>(</rp>
                        <rt class="text-xs text-gray-500">{{ $home->name_kana }}</rt>
                        <rp>)</rp>
                    </ruby>
                </h2>
            </a>

            <table class="mt-3 table-auto border-collapse border-spacing-x-2">
                <tr>
                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">住所</th>
                    <td class="pl-3">{{ $home->address }}</td>
                </tr>
                <tr>
                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">月額費用</th>
                    <td class="pl-3">
                        @if($home->cost?->total > 0)
                            <span class="text-red-500 font-extrabold">
                            {{ $home->cost->total }}円
                            </span>
                            (家賃補助後
                            <span class="text-red-500 font-extrabold">
                                {{ $home->cost?->total - $home->cost->support }}円</span>)
                        @else
                            不明
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">対象区分</th>
                    <td class="pl-3">
                        @if($home->level > 0)
                            区分{{ $home->level }}以上
                        @else
                            区分なし以上
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">類型</th>
                    <td class="pl-3">{{ $home->type?->type ?? '不明' }}</td>
                </tr>
                @isset($home->url)
                    <tr>
                        <th class="bg-indigo-100 dark:bg-gray-800 p-2">URL</th>
                        <td class="pl-3">
                            <a href="{{ $home->url }}"
                               target="_blank"
                               class="text-indigo-500 dark:text-white hover:underline"
                               rel="nofollow">
                                {{ Str::truncate($home->url, 50) }}
                            </a>
                        </td>
                    </tr>
                @endisset
            </table>
        </div>
    </x-box>
</div>
