<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <ul>
                    <li class="p-3">
                        <a href="{{ route('operator-requests.index') }}"
                           class="text-xl text-indigo-500 font-bold hover:underline">
                            {{ __('事業者申請') }} [{{ \App\Models\OperatorRequest::count() }}]
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
