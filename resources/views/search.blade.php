<form action="{{ request()->routeIs(['pref', 'area']) ? url()->current() : route('index') }}"
      method="get">
    <x-jet-label for="search" value="{{ __('検索') }}" class="hidden"/>
    <x-jet-input name="q" type="search" class="block max-w-full dark:bg-gray-800"
                 value="{{ request('q') }}"
                 placeholder="{{ request()->routeIs(['pref', 'area']) ? request()->pref->name.'から検索' : 'キーワード検索' }}"
    />

    <x-jet-label for="level" value="{{ __('対象区分') }}" class="mt-3 dark:text-white"/>

    <select name="level"
            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
        <option value="" @if(request()->missing('level')) selected @endif>指定しない</option>
        <option value="0" @if(request('level') === '0') selected @endif>区分なし</option>
        @foreach(range(1, 6) as $level)
            <option value="{{ $level }}" @if(request('level') == $level) selected @endif>{{ $level }}以上</option>
        @endforeach
    </select>

    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition min-w-max w-full mt-3" title="検索">検索</button>
</form>
