<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required|max:255',
        ];

        if ($this->isMethod('post')) {
            $rules['img_path'] = 'required';
        } else {
            $rules['img_path'] = 'nullable';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'product_name.required' => '商品名は入力必須です。',
            'product_name.max' => '商品名は255文字以内で入力してください。',
            'price.required' => '価格は入力必須です。',
            'stock.required' => '在庫数は入力必須です。',
            'description.required' => '商品説明は入力必須です。',
            'description.max' => '商品説明は255以内で入力してください。',
            'img_path.required' => '商品画像を選択してください。',
        ];
    }
}
