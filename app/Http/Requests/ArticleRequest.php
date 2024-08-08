<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
                'posted_date' => 'required | date_format:Y-m-d',
                'title' => 'required',
                'article_contents' => 'required'
            ];
        }
    
        public function attributes() {
            return [
                'posted_date' => '投稿日時',
                'title' => 'タイトル',
                'article_contents' => '本文'
            ];
        }
    
        public function messages() {
            return [
                'posted_date.required' => '▷:attributeは必須項目です。',
                'title.required' => '▷:attributeは必須項目です。',
                'article_contents.required' => '▷:attributeは必須項目です。',
                'posted_date.date_format' => '▷:attributeは半角英数で入力してください。'
            ];
        }
    }
