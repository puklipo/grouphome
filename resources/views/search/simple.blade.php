<form action="{{ request()->routeIs(['pref', 'pref.area']) ? url()->current() : route('index') }}"
      method="get">
    <x-label for="search" value="{{ __('検索') }}" class="hidden"/>
    <x-input name="q" id="search" type="search" class="block max-w-full text-black bg-white dark:bg-gray-800 dark:text-white"
                 value="{{ request('q') }}"
                 placeholder="{{ request()->routeIs(['pref', 'pref.area']) ? (request()->area ?? request()->pref->name).'から検索' : 'キーワード検索' }}"
    />

    <x-label for="sort" value="{{ __('並べ替え') }}" class="mt-3 dark:text-white"/>

    @includeIf('search.sort')

    <x-label for="level" value="{{ __('対象区分') }}" class="mt-3 dark:text-white"/>

    <x-select name="level" id="level">
        <option value="" @selected(request()->missing('level'))>指定しない</option>
        <option value="0" @selected(request('level') === '0')>区分なし</option>
        @foreach(range(1, 6) as $level)
            <option value="{{ $level }}" @selected(request('level') == $level)>{{ $level }}以上</option>
        @endforeach
    </x-select>

    <x-label for="type" value="{{ __('サービス類型') }}" class="mt-3 dark:text-white"/>

    <x-select name="type" id="type">
        <option value="" @selected(request()->missing('type'))>指定しない</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" @selected(request('type') == $type->id)>{{ $type->type }}</option>
        @endforeach
    </x-select>


    <x-label for="vacancy" value="{{ __('空室') }}" class="mt-3 dark:text-white"/>

    <x-select name="vacancy" id="vacancy">
        <option value="" @selected(request()->missing('vacancy'))>指定しない</option>
        <option value="0" @selected(request('vacancy') === '0')>{{ __('空室あり') }}</option>
        <option value="1" @selected(request('vacancy') === '1')>{{ __('満室') }}</option>
    </x-select>

    <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition min-w-max w-full mt-3"
            title="検索"><x-icon.search class="inline stroke-1"></x-icon.search>検索
    </button>
</form>
