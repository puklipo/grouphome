<?php

namespace App\Http\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 共有設備.
 */
class FacilityEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules(): array
    {
        return collect(config('facility'))
            ->mapWithKeys(fn ($item, $key) => ['home.facility.'.$key => 'boolean'])
            ->toArray();
    }

    public function mount(): void
    {
        $this->home->facility()->firstOrCreate();
    }

    /**
     * @throws AuthorizationException
     */
    public function updated($value, $name): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        $this->home->facility->save();
    }

    public function render(): View
    {
        return view('livewire.home.facility-editor');
    }
}
