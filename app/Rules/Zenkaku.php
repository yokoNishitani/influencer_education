<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Zenkaku implements Rule
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
        return (bool) preg_match('/^[ぁ-んァ-ヶー一-龠]+$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ユーザーネームは全角で入力してください。';
    }
}
