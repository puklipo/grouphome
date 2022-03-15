<div class="m-3">
    @include('homes.header')

    <x-box>

        @include('homes.cover')

        <div class="p-3">
            <a href="{{ route('home.show', $home) }}">
                <h2 class="inline-flex text-5xl text-indigo-500 dark:text-white font-extrabold tracking-widest break-all hover:text-indigo-600 dark:hover:text-white dark:hover:underline">
                    {{ $home->name }}
                </h2>
            </a>
            <div class="my-1">{{ $home->address }}</div>

            @isset($home->url)
                <div class="my-1">
                    <a href="{{ $home->url }}" target="_blank"
                       class="text-indigo-500 dark:text-white font-bold hover:underline">
                        {{ Str::limit($home->url) }}
                    </a>
                </div>
            @endisset

            <table class="table-auto">
                <tr>
                    <th>月額費用</th>
                    <td>
                        @if($home->cost->total > 0)
                            <span class="text-red-500 font-extrabold">
                            {{ $home->cost->total }}円
                            </span>
                            (家賃補助後
                            <span class="text-red-500 font-extrabold">
                                {{ $home->cost->total - $home->cost->support }}円</span>)
                        @else
                            不明
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>対象区分</th>
                    <td>
                        @if($home->level > 0)
                            区分{{ $home->level }}以上
                        @else
                            区分なし以上
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>類型</th>
                    <td>{{ $home->type->type ?? '不明' }}</td>
                </tr>
            </table>
        </div>
    </x-box>

</div>
