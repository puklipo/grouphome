<div class="mt-6">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        写真
    </span>
</div>
<div class="border-4 border-indigo-500 p-3 dark:border-gray-800 flex flex-wrap">
    @foreach(config('photo') as $column => $name)
        <livewire:photo-editor :home="$home" :origin="$home->photo->$column" :column="$column" :name="$name"/>
    @endforeach
</div>
