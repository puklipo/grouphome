<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('事業者申請') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <h2 class="text-4xl p-3">{{ __('事業者申請') }}</h2>
                <ul>
                    @foreach($requests as $request)
                        <li class="p-3 flex justify-start">
                            <a href="{{ route('home.show', $request->home) }}"
                               class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                                {{ $request->home->name }}
                            </a>
                            <span class="text-md text-gray-500 ml-6">{{ $request->user->name }}</span>
                            <span class="text-md text-gray-500 ml-6">
                            <form action="{{ route('operator-requests.update', $request) }}" method="post">
                                @csrf
                                @method('PUT')
                                 <x-jet-button class="ml-4">
                                     {{ __('承認') }}
                                 </x-jet-button>
                            </form>
                            </span>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
