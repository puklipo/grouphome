<x-main-layout>
    <x-slot name="title">
        {{ __('お問い合わせプレビュー') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('お問い合わせプレビュー') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg p-3">
                <table class="table-auto w-full">
                    <tr>
                        <th>日時</th>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    <tr>
                        <th>名前</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>メール</th>
                        <td><a href="mailto:{{ $contact->email }}"
                               class="text-indigo-500 dark:text-white hover:underline">{{ $contact->email }}</a></td>
                    </tr>
                    <tr>
                        <th>本文</th>
                        <td class="p-1 bg-gray-50">{!! nl2br(e($contact->body)) !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-main-layout>
