<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class ValidNim implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (!preg_match('/^I03[0-9]{5}$/', $value)) {
            $fail('The :attribute does not match the required format.');
        }
    }
}
