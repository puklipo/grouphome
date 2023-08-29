<?php

namespace App\Livewire\Forms;

use App\Models\Condition;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ConditionForm extends Form
{
    public Condition $condition;

    #[Rule('boolean')]
    public bool $trial = false;

    #[Rule('boolean')]
    public bool $man = false;

    #[Rule('boolean')]
    public bool $woman = false;

    #[Rule('boolean')]
    public bool $mix = false;

    public function setForm(Condition $condition): void
    {
        $this->condition = $condition;

        foreach (config('condition') as $key => $name) {
            $this->$key = $condition->$key;
        }
    }

    public function save(): void
    {
        $this->condition
            ->forceFill($this->except(['condition']))
            ->save();
    }
}
