<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
    public function rules() {
        return [
            'name' => 'required',
            'name_kana' => 'required | regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'email' => 'required | regex:/^[!-~]+$/ | email'
        ];
    }

    public function attributes() {
        return [
            'name' => 'ユーザーネーム',
            'name_kana' => 'カナ',
            'email' => 'メールアドレス'
        ];
    }

    public function messages() {
        return [
            'name.required' => '▷:attributeは必須項目です。',
            'name_kana.required' => '▷:attributeは必須項目です。',
            'email.required' => '▷:attributeは必須項目です。',
            'name_kana.regex' => '▷:attributeはカナで入力してください。',
            'email.regex' => '▷:attributeは半角英数で入力してください。',
            'email.email' => '▷:attributeは@を含めて入力してください'
        ];
    }
}
