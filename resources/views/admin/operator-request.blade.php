<x-main-layout>
    <x-slot name="title">
        {{ __('事業者申請') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('事業者申請') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                {{  $requests->links() }}
                <ul>
                    @forelse($requests as $request)
                        <li class="p-3 flex justify-start">
                            <a href="{{ route('home.show', $request->home) }}"
                               class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                                {{ $request->home->name }}
                            </a>

                            <span class="text-lg text-gray-800 dark:text-gray-300 font-bold ml-6">
                                {{ $request->user->name }} [{{ $request->user->email }}]
                            </span>

                            <span class="text-lg text-gray-500 ml-6">
                                {{ $request->created_at }}
                            </span>

                            <form action="{{ route('operator-requests.update', $request) }}" method="post">
                                @csrf
                                @method('PUT')
                                <x-jet-button class="ml-4">
                                    {{ __('承認') }}
                                </x-jet-button>
                            </form>

                            <form action="{{ route('operator-requests.destroy', $request) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-jet-danger-button type="submit" class="ml-4">
                                    {{ __('却下') }}
                                </x-jet-danger-button>
                            </form>

                        </li>
                    @empty
                        <div class="p-3">申請はありません。</div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
