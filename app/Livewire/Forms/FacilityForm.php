<?php

namespace App\Livewire\Forms;

use App\Models\Facility;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FacilityForm extends Form
{
    public Facility $facility;

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
    public bool $wash = false;

    #[Validate('boolean')]
    public bool $tv = false;

    #[Validate('boolean')]
    public bool $dining = false;

    #[Validate('boolean')]
    public bool $living = false;

    #[Validate('boolean')]
    public bool $delivery_box = false;

    #[Validate('boolean')]
    public bool $internet = false;

    #[Validate('boolean')]
    public bool $internet_free = false;

    #[Validate('boolean')]
    public bool $wifi = false;

    #[Validate('boolean')]
    public bool $pet = false;

    #[Validate('boolean')]
    public bool $barrier_free = false;

    #[Validate('boolean')]
    public bool $car = false;

    #[Validate('boolean')]
    public bool $apartment = false;

    #[Validate('boolean')]
    public bool $house = false;

    public function setForm(Facility $facility): void
    {
        $this->facility = $facility;

        foreach (config('facility') as $key => $name) {
            $this->$key = $facility->$key;
        }
    }

    public function save(): void
    {
        $this->validate();

        $this->facility
            ->forceFill($this->except(['facility']))
            ->save();
    }
}
