<x-main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                <ul>
                    <li class="p-3">
                        <a href="{{ route('operator-requests.index') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('事業者申請') }} [{{ \App\Models\OperatorRequest::count() }}]
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
