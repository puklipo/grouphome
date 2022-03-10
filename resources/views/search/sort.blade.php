
<select name="sort"
        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
    <option value="" @selected(request()->missing('sort'))>なし</option>
    <option value="updated" @selected(request('sort') === 'updated')>更新が新しい順</option>
    <option value="low" @selected(request('sort') === 'low')>費用が安い順</option>
    <option value="high" @selected(request('sort') === 'high')>費用が高い順</option>
    <option value="address" @selected(request('sort') === 'address')>住所</option>
    <option value="release" @selected(request('sort') === 'release')>指定年月日(新着順)</option>
    <option value="name" @selected(request('sort') === 'name')>グループホーム名</option>
    <option value="pref" @selected(request('sort') === 'pref')>都道府県(北から)</option>
    <option value="id" @selected(request('sort') === 'id')>事業所番号(降順)</option>
</select>
