<div>
    <div class="py-3">お問い合わせメールの記録用。メールが届いてない時（もしくはメールを見られない人）はここで確認。</div>

    @forelse($contacts as $contact)

        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg p-3 mb-3" wire:key="{{ $contact->id }}">

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
                <tr>
                    <th></th>
                    <td><a href="{{ URL::temporarySignedRoute('contact.preview', now()->addDay(), $contact) }}" class="text-indigo-500 dark:text-white hover:underline">プレビュー</a></td>
                </tr>
            </table>
        </div>

    @empty
        <div class="p-3">お問い合わせはありません。</div>
    @endforelse

    {{ $contacts->links() }}
</div>
