<?php

namespace App\Livewire\Forms;

use App\Models\Facility;
use Livewire\Attributes\Rule;
use Livewire\Form;

class FacilityForm extends Form
{
    public Facility $facility;

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
    public bool $wash = false;

    #[Rule('boolean')]
    public bool $tv = false;

    #[Rule('boolean')]
    public bool $dining = false;

    #[Rule('boolean')]
    public bool $living = false;

    #[Rule('boolean')]
    public bool $delivery_box = false;

    #[Rule('boolean')]
    public bool $internet = false;

    #[Rule('boolean')]
    public bool $internet_free = false;

    #[Rule('boolean')]
    public bool $wifi = false;

    #[Rule('boolean')]
    public bool $pet = false;

    #[Rule('boolean')]
    public bool $barrier_free = false;

    #[Rule('boolean')]
    public bool $car = false;

    #[Rule('boolean')]
    public bool $apartment = false;

    #[Rule('boolean')]
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
        $this->facility
            ->forceFill($this->except(['facility']))
            ->save();
    }
}
