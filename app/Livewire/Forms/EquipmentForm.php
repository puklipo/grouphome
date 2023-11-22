<?php

namespace App\Livewire\Forms;

use App\Models\Equipment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EquipmentForm extends Form
{
    public Equipment $equipment;

    #[Validate('boolean')]
    public bool $closet = false;

    #[Validate('boolean')]
    public bool $aircon = false;

    #[Validate('boolean')]
    public bool $kitchen = false;

    #[Validate('boolean')]
    public bool $toilet = false;

    #[Validate('boolean')]
    public bool $bath = false;

    #[Validate('boolean')]
    public bool $shower = false;

    #[Validate('boolean')]
    public bool $bed = false;

    #[Validate('boolean')]
    public bool $tv = false;

    #[Validate('boolean')]
    public bool $wash = false;

    #[Validate('boolean')]
    public bool $internet = false;

    #[Validate('boolean')]
    public bool $internet_free = false;

    #[Validate('boolean')]
    public bool $wifi = false;

    #[Validate('boolean')]
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
        $this->validate();

        $this->equipment
            ->forceFill($this->except(['equipment']))
            ->save();
    }
}
