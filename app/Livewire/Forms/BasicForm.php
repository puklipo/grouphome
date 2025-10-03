<?php

namespace App\Livewire\Forms;

use App\Models\Home;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BasicForm extends Form
{
    public Home $home;

    #[Validate('string|nullable')]
    public ?string $released_at;

    #[Validate('string|nullable')]
    public ?string $wam;

    #[Validate('string|nullable')]
    public ?string $map;

    #[Validate('string|nullable')]
    public ?string $area;

    #[Validate('string|nullable')]
    public ?string $address;

    public function setForm(Home $home): void
    {
        $this->home = $home;

        $this->released_at = $home->released_at?->toDateString();
        $this->wam = $home->wam;
        $this->map = $home->map;
        $this->area = $home->area;
        $this->address = $home->address;
    }

    public function save(): void
    {
        $this->validate();

        $this->home
            ->forceFill($this->except(['home']))
            ->save();
    }
}
