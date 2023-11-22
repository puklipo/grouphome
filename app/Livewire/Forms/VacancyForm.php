<?php

namespace App\Livewire\Forms;

use App\Models\Vacancy;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VacancyForm extends Form
{
    public Vacancy $vacancy;

    #[Validate('boolean')]
    public bool $filled = false;

    #[Validate('string|nullable')]
    public ?string $message = null;

    public function setForm(Vacancy $vacancy): void
    {
        $this->vacancy = $vacancy;
        $this->filled = $vacancy->filled;
        $this->message = $vacancy->message;
    }

    public function save(): void
    {
        $this->validate();

        $this->vacancy
            ->forceFill($this->except(['vacancy']))
            ->save();
    }
}
