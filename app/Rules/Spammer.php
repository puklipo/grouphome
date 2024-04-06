<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
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
        collect(config('spam'))
            ->each(function ($mail) use ($value, $fail) {
                if (Str::is($mail, $value)) {
                    info('Spam: '.$value);

                    $fail('');

                    return false;
                }
            });
    }
}
