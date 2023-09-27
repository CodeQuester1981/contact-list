<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomValidation implements Rule
{
    public function passes($attribute, $value)
    {
        // Define custom validation logic here.
        if ($attribute === 'id_number') {
            return preg_match('/^[A-Za-z0-9]+$/', $value);
        } elseif ($attribute === 'mobile_number') {
            // Allow for common variations in mobile number formats
            return preg_match('/^\d{10}$/', preg_replace('/[^0-9]/', '', $value));
        }

        return false;
    }

    public function message()
    {
        return 'The :attribute is not valid.';
    }
}
