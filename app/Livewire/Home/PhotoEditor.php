<?php

namespace App\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoEditor extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public Home $home;

    public string $origin = '';

    public null|UploadedFile|string $photo = null;

    public string $column;

    public string $name;

    public bool $showModal = false;

    public function mount(): void
    {
        abort_if($this->column === 'id', 500);

        $this->home->photo()->firstOrCreate();
    }

    /**
     * @throws AuthorizationException
     */
    public function save(): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->validate([
            'photo' => ['image', 'max:'. 1024 * 3],
        ]);

        $path = $this->photo->storePublicly('photos/'.$this->home->id);

        $this->home->photo->forceFill([
            $this->column => $path,
        ])->save();

        $this->origin = $path;
        $this->reset('photo');
    }

    public function delete(): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->photo->forceFill([
            $this->column => null,
        ])->save();

        if (Storage::exists($this->origin)) {
            Storage::delete($this->origin);
        }

        $this->origin = '';
    }

    public function render(): View
    {
        return view('livewire.home.photo-editor');
    }
}
