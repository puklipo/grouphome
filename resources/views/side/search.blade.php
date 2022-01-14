<form action="{{ request()->routeIs(['pref', 'pref.area']) ? url()->current() : route('index') }}"
      method="get">
    <x-jet-label for="search" value="{{ __('検索') }}" class="hidden"/>
    <x-jet-input name="q" type="search" class="block max-w-full text-black bg-white dark:bg-gray-800 dark:text-white"
                 value="{{ request('q') }}"
                 placeholder="{{ request()->routeIs(['pref', 'pref.area']) ? (request()->area ?? request()->pref->name).'から検索' : 'キーワード検索' }}"
    />

    <x-jet-label for="sort" value="{{ __('並べ替え') }}" class="mt-3 dark:text-white"/>

    <select name="sort"
            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
        <option value="" @if(request()->missing('sort')) selected @endif>なし</option>
        <option value="release" @if(request('sort') === 'release') selected @endif>指定年月日(新着順)</option>
        <option value="name" @if(request('sort') === 'name') selected @endif>グループホーム名</option>

        <option value="pref" @if(request('sort') === 'pref') selected @endif>都道府県(北から)</option>
    </select>

    <x-jet-label for="level" value="{{ __('対象区分') }}" class="mt-3 dark:text-white"/>

    <select name="level"
            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
        <option value="" @if(request()->missing('level')) selected @endif>指定しない</option>
        <option value="0" @if(request('level') === '0') selected @endif>区分なし</option>
        @foreach(range(1, 6) as $level)
            <option value="{{ $level }}" @if(request('level') == $level) selected @endif>{{ $level }}以上</option>
        @endforeach
    </select>

    <x-jet-label for="type" value="{{ __('サービス類型') }}" class="mt-3 dark:text-white"/>

    <select name="type"
            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
        <option value="" @if(request()->missing('type')) selected @endif>指定しない</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" @if(request('type') == $type->id) selected @endif>{{ $type->type }}</option>
        @endforeach
    </select>


    <x-jet-label for="vacancy" value="{{ __('空室') }}" class="mt-3 dark:text-white"/>

    <select name="vacancy"
            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
        <option value="" @if(request()->missing('vacancy')) selected @endif>指定しない</option>
        <option value="0" @if(request('vacancy') === '0') selected @endif>{{ __('空室あり') }}</option>
        <option value="1" @if(request('vacancy') === '1') selected @endif>{{ __('満室') }}</option>
    </select>

    <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-md text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition min-w-max w-full mt-3"
            title="検索">検索
    </button>
</form>
