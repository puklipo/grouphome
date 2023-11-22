<?php

namespace App\Livewire\Forms;

use App\Models\Condition;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ConditionForm extends Form
{
    public Condition $condition;

    #[Validate('boolean')]
    public bool $trial = false;

    #[Validate('boolean')]
    public bool $man = false;

    #[Validate('boolean')]
    public bool $woman = false;

    #[Validate('boolean')]
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
        $this->validate();

        $this->condition
            ->forceFill($this->except(['condition']))
            ->save();
    }
}
