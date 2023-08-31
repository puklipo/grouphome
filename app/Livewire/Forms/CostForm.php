<?php

namespace App\Livewire\Forms;

use App\Models\Cost;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CostForm extends Form
{
    public Cost $cost;

    #[Rule('required|numeric|integer|min:0', as: '費用合計')]
    public int $total;

    #[Rule('required|numeric|integer|min:0', as: '家賃')]
    public int $rent;

    #[Rule('required|numeric|integer|min:0', as: '食費')]
    public int $food;

    #[Rule('required|numeric|integer|min:0', as: '水道・光熱費')]
    public int $utilities;

    #[Rule('required|numeric|integer|min:0', as: '日用品・雑費・共益費')]
    public int $daily;

    #[Rule('required|numeric|integer|min:0', as: 'その他')]
    public int $etc;

    #[Rule('required|numeric|integer|min:0', as: '家賃補助')]
    public int $support;

    #[Rule('nullable', as: '補足説明')]
    public ?string $message;

    public function setForm(Cost $cost): void
    {
        $this->cost = $cost;

        foreach (config('cost') as $key => $name) {
            $this->$key = $cost->$key;
        }
    }

    public function calcTotal(): void
    {
        $this->total = $this->rent
            + $this->food
            + $this->utilities
            + $this->daily
            + $this->etc;
    }

    public function save(): void
    {
        $this->validate();

        $this->cost
            ->forceFill($this->except(['cost']))
            ->save();
    }
}
