<div class="m-3">
    @include('homes.header')

    <div class="border-4 border-indigo-500 dark:border-gray-800">

        @if(filled($home->photo->cover) && Storage::exists($home->photo->cover))
            <a href="{{ route('home.show', $home) }}">
                <img src="{{ Storage::url($home->photo->cover) }}"
                     class="m-0 dark:grayscale w-full max-h-20 sm:max-h-36 object-cover object-center overflow-hidden hover:opacity-80"
                     alt="{{ $home->name }}">
            </a>
        @endif

        <div class="p-3">
            <a href="{{ route('home.show', $home) }}">
                <h2 class="inline-flex text-5xl text-indigo-500 dark:text-white font-extrabold tracking-widest break-all hover:text-indigo-600 dark:hover:text-white dark:hover:underline">
                    {{ $home->name }}
                </h2>
            </a>
            <div class="text-md my-3">{{ $home->address }}</div>

            <table class="table-auto">
                <tr>
                    <th>月額費用</th>
                    <td>
                        @if($home->cost->total > 0)
                            <span class="font-extrabold">
                            {{ $home->cost->total }}円
                            </span>
                            (家賃補助後 <span class="font-extrabold">{{ $home->cost->total - $home->cost->support }}円</span>)
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
                            区分なし
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>類型</th>
                    <td>{{ $home->type->type ?? '不明' }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
