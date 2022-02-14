@if(filled($home->photo->cover) && Storage::exists($home->photo->cover))
    <a href="{{ route('home.show', $home) }}">
        <img src="{{ Storage::url($home->photo->cover) }}"
             class="m-0 dark:grayscale w-full max-h-20 sm:max-h-36 object-cover object-center overflow-hidden hover:opacity-80"
             alt="{{ $home->name }}">
    </a>
@endif
