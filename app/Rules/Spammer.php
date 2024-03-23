<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Spammer implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $spam = collect(config('spam'))
            ->map(fn ($mail) => Str::afterLast($mail, '@'))
            ->unique();

        $domain = Str::afterLast($value, '@');

        if ($spam->contains($domain)) {
            $fail('');
        }
    }
}
