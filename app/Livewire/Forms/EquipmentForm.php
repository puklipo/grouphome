<?php

namespace App\Livewire\Forms;

use App\Models\Equipment;
use Livewire\Attributes\Rule;
use Livewire\Form;

class EquipmentForm extends Form
{
    public Equipment $equipment;

    #[Rule('boolean')]
    public bool $closet = false;

    #[Rule('boolean')]
    public bool $aircon = false;

    #[Rule('boolean')]
    public bool $kitchen = false;

    #[Rule('boolean')]
    public bool $toilet = false;

    #[Rule('boolean')]
    public bool $bath = false;

    #[Rule('boolean')]
    public bool $shower = false;

    #[Rule('boolean')]
    public bool $bed = false;

    #[Rule('boolean')]
    public bool $tv = false;

    #[Rule('boolean')]
    public bool $wash = false;

    #[Rule('boolean')]
    public bool $internet = false;

    #[Rule('boolean')]
    public bool $internet_free = false;

    #[Rule('boolean')]
    public bool $wifi = false;

    #[Rule('boolean')]
    public bool $furniture = false;

    public function setForm(Equipment $equipment): void
    {
        $this->equipment = $equipment;

        foreach (config('equipment') as $key => $name) {
            $this->$key = $equipment->$key;
        }
    }

    public function save(): void
    {
        $this->equipment
            ->forceFill($this->except(['equipment']))
            ->save();
    }
}
