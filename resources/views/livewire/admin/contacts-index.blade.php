<div x-data @page-updated.window="$el.scrollIntoView({behavior: 'smooth'})">
    <div class="py-3">お問い合わせメールの記録用。メールが届いてない時（もしくはメールを見られない人）はここで確認。</div>

    @forelse($contacts as $contact)

        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg p-3 mb-3">

            <table class="table-auto">
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
                    <td>{!! nl2br(e($contact->body)) !!}</td>
                </tr>
            </table>
        </div>

    @empty
        <div class="p-3">お問い合わせはありません。</div>
    @endforelse

    {{ $contacts->links() }}
</div>
