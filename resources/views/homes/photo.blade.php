<div class="mt-6 flex justify-between">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        写真
    </span>
    @if(filled($home->photo->updated_at))
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white">
        <time datetime="{{ $home->photo->updated_at }}"
              title="{{ $home->photo->updated_at->toDateString() }}">
            {{ $home->photo->updated_at->diffForHumans() }}
        </time>更新
    </span>
    @endif
</div>
<div class="border-4 border-indigo-500 dark:border-gray-800 flex flex-wrap">
    @foreach(config('photo') as $column => $name)
        <livewire:photo-editor :home="$home" :origin="$home->photo->$column ?? ''" :column="$column" :name="$name"/>
    @endforeach
</div>
