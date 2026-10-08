<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'name_kanji' => 'required|max:255',
            'name_kana' => 'max:255',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'ユーザー名は入力必須です。',
            'name.max' => 'ユーザー名は255文字以内で入力してください。',
            'email.required' => 'メールアドレスは入力必須です。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'name_kanji.required' => '名前は入力必須です。',
            'name_kanji.max' => '名前は255文字以内で入力してください。',
            'name_kana.max' => 'カナは255文字以内で入力してください。',
        ];
    }
}
