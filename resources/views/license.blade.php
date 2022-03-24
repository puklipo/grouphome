<x-main-layout>
    <x-slot name="title">
        {{ __('利用規約・ライセンス') }}
    </x-slot>

    <div class="py-6">
        <div class="px-6 lg:px-8">
            <h1 class="text-4xl my-10">{{ config('app.name') }} {{ __('利用規約・ライセンス') }}</h1>

            <div class="prose dark:prose-invert prose-indigo prose-a:text-indigo-500 max-w-none">
                {!! Str::markdown(File::get(resource_path('markdown/license.md'))) !!}
            </div>
        </div>
    </div>
</x-main-layout>
