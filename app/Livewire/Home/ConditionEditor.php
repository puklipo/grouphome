<?php

namespace App\Livewire\Home;

use App\Livewire\Forms\ConditionForm;
use App\Models\Home;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

/**
 * 利用条件.
 */
class ConditionEditor extends Component
{
    use AuthorizesRequests;

    public Home $home;

    public ConditionForm $condition;

    #[Rule('integer|numeric|between:0,6')]
    public int $level;

    #[Rule('nullable|integer|numeric|between:1,4')]
    public ?int $type_id;

    public function mount(): void
    {
        $this->home->condition()->firstOrCreate();

        $this->condition->setForm($this->home->condition);

        $this->level = $this->home->level;
        $this->type_id = $this->home->type_id;
    }

    /**
     * @throws AuthorizationException
     */
    public function updated($name, $value): void
    {
        if (Gate::denies('admin')) {
            $this->authorize('update', $this->home);
        }

        if (Str::startsWith($name, 'condition.')) {
            $this->condition->save();

            $this->home->refresh();

            return;
        }

        //類型を「不明」に設定する時はここでnullに。$valueが''なのでDBでエラー。
        if ($name === 'type_id' && blank($value)) {
            $this->fill(['type_id' => null]);
        }

        $this->home->forceFill([
            'level' => $this->level,
            'type_id' => $this->type_id,
        ])->save();

        //refreshしないとすぐに反映されない。
        $this->home->refresh();
    }

    public function render(): View
    {
        return view('livewire.home.condition-editor');
    }
}
