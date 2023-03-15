<?php

namespace App\Http\Livewire\Home;

use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

/**
 * 利用条件.
 */
class ConditionEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    protected function rules(): array
    {
        return collect(config('condition'))
            ->mapWithKeys(fn ($item, $key) => ['home.condition.'.$key => 'boolean'])
            ->merge([
                'home.level' => 'integer|numeric|between:0,6',
                'home.type_id' => 'nullable|integer|numeric|between:1,4',
            ])
            ->toArray();
    }

    public function mount(): void
    {
        $this->home->condition()->firstOrCreate();
    }

    /**
     * @throws AuthorizationException
     */
    public function updated($name, $value): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        if (Str::startsWith($name, 'home.condition.')) {
            $this->home->condition->save();

            return;
        }

        //類型を「不明」に設定する時はここでnullに。$valueが''なのでDBでエラー。
        if ($name === 'home.type_id' && blank($value)) {
            $this->fill(['home.type_id' => null]);
        }

        $this->home->save();

        //refreshしないとすぐに反映されない。
        $this->home->refresh();

        $this->home->condition->touch();
    }

    public function render(): View
    {
        return view('livewire.home.condition-editor');
    }
}
