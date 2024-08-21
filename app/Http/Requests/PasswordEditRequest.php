<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'current_password' => 'required | current_password',
            'new_password' => 'required | string | min:8 | confirmed'
        ];
    }

    public function attributes() {
        return [
            'current_password' => '旧パスワード',
            'new_password' => '新パスワード'
        ];
    }

    public function messages() {
        return [
            'current_password.required' => '▷:attributeは必須項目です。',
            'current_password.current_password' => '▷:attributeが正しくありません。',
            'new_password.required' => '▷:attributeは必須項目です。',
            'new_password.string' => '▷:attributeは文字列でなければなりません。',
            'new_password.min' => '▷:attributeは8文字以上でなければなりません。',
            'new_password.confirmed' => '▷:attributeと確認用パスワードが一致しません。'
        ];
    }
}
