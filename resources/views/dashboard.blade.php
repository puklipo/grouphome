<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="text-4xl p-3">管理グループホーム</h2>
                <ul>
                    @foreach($homes as $home)
                        <li class="p-3">
                            <a href="{{ route('home.show',$home) }}"
                               class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">{{ $home->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
