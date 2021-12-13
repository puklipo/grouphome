<aside class="w-full sm:w-56 flex-none sm:min-h-screen sm:order-first order-last p-5 sm:border-r bg-indigo-50">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5">
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </h2>

    @if (isset($side))
        {{ $side }}
    @endif

    <div class="text-sm mt-10 p-1 border-t">Copyright&copy; <a href="https://sds.fukuoka.jp/" class="font-bold text-indigo-500 hover:underline"
            target="_blank" rel="noopener">ポップカルチャースタジオ未来図</a> All Rights Reserved.</div>
</aside>
