<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoEmoji implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //

        return !preg_match('/([\xF0-\xF7][\x80-\xBF][\x80-\xBF][\x80-\xBF])/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '絵文字が含まれています';
    }
}
