<x-main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('管理者メニュー') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                <ul>
                    <li class="p-3">
                        <a href="{{ route('operator-requests.index') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('事業者申請') }} [{{ \App\Models\OperatorRequest::count() }}]
                        </a>
                    </li>
                    <li class="p-3">
                        <a href="{{ route('operator-home.index') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('事業者管理') }}
                        </a>
                        <span class="text-gray-500 ml-3">事業者とグループホームの紐付けを解除。</span>
                    </li>
                    <li class="p-3">
                        <a href="{{ route('admin.contacts') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('お問い合わせ一覧') }} [{{ \App\Models\Contact::count() }}]
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
