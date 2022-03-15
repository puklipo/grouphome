<x-box-header class="mt-6">
    <x-slot name="left">
        マップ
    </x-slot>
</x-box-header>

<x-box class="p-3">
    @if( Str::contains($home->map ?? '', '<iframe'))
        {!! $home->map !!}
    @else
        <iframe
            src="https://maps.google.co.jp/maps?output=embed&q={{ rawurlencode($home->address) }}&z=16&t=h"
            class="w-full h-96 border-0" allowfullscreen="" loading="lazy"></iframe>

        <div>
            <a href="https://www.google.com/maps/search/{{ rawurlencode($home->address.' '.$home->name) }}"
               target="_blank"
               class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                Googleマップで検索
            </a>
        </div>
    @endif
</x-box>
