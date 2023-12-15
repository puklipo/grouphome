<x-main-layout>
    <x-slot name="title">
        {{ __('事業者管理') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-red-500 font-semibold text-xl leading-tight">
            <x-icon.lock class="inline"></x-icon.lock>{{ __('事業者管理') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{ $users->links() }}

            @foreach($users as $user)
                <div
                    class="md:grid md:grid-cols-3 md:gap-6 mt-3 p-3 bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                    <x-section-title>
                        <x-slot name="title">{{ $user->name }}</x-slot>
                        <x-slot name="description">{{ $user->email }}</x-slot>
                    </x-section-title>

                    <div class="md:col-span-2">
                        <ul class="p-1 sm:rounded-md">
                            @foreach($user->homes as $home)
                                <li class="p-3 flex justify-between">
                                    <a href="{{ route('home.show', $home) }}"
                                       class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                                        {{ $home->name }}
                                    </a>
                                    <form action="{{ route('operator-home.destroy',[$user, $home]) }}"
                                          method="post"
                                          class="flex justify-start align-text-bottom">
                                        @csrf
                                        @method('DELETE')

                                        <x-checkbox name="confirm" value="1" class="ml-3 checked:text-red-500"/>
                                        <x-label for="confirm" value="解除確認" class="leading-tight"/>

                                        <x-danger-button type="submit" class="ml-3">
                                            {{ __('解除') }}
                                        </x-danger-button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

            {{ $users->links() }}

        </div>
    </div>
</x-main-layout>
