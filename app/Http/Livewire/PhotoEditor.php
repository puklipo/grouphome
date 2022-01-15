<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoEditor extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public Home $home;
    public $origin;
    public $photo;
    public $column;
    public $name;

    public function mount()
    {
        $this->home->photo()->firstOrCreate();
    }

    public function save()
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->validate([
            'photo' => 'image|max:1024',
        ]);

        $path = $this->photo->storePublicly('photos');

        $this->home->photo->fill([
            $this->column => $path,
        ])->save();

        $this->origin = $path;
    }

    public function delete()
    {
        $this->home->photo->fill([
            $this->column => '',
        ])->save();

        $this->origin = '';
    }

    public function render()
    {
        return view('livewire.photo-editor');
    }
}
