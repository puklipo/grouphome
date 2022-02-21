<x-main-layout>
    <x-slot name="title">
        {{ __('事業者管理') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('事業者管理') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                <ul>
                    @foreach($users as $user)
                        <li class="p-3">
                            <span class="text-lg text-gray-800 dark:text-gray-300 font-bold ml-6">
                                {{ $user->name }}
                            </span>

                            <ul class="ml-10">
                                @foreach($user->homes as $home)
                                    <li class="p-3 flex justify-start">
                                        {{ $home->name }}

                                        <form action="{{ route('operator-home.destroy',[$user, $home]) }}"
                                              method="post"
                                              class="flex justify-start align-text-bottom">
                                            @csrf
                                            @method('DELETE')

                                            <x-jet-checkbox name="confirm" value="1" class="ml-3 checked:text-red-500"/>
                                            <x-jet-label for="confirm" value="確認" class="leading-tight"/>

                                            <x-jet-danger-button type="submit" class="ml-3">
                                                {{ __('解除') }}
                                            </x-jet-danger-button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
