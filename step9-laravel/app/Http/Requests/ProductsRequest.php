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
        return [
            'product_name' => 'required|max:255',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required|max:255',
            'img_path' => 'required',
        ];
    }

    public function message()
    {
        return [
            'product_name.required' => '商品名は入力必須です。',
            'product_name.max' => '商品名は255文字以内で入力してください。',
            'price.required' => '価格は入力必須です。',
            'stock.required' => '在庫数は入力必須です。',
            'description.required' => '商品説明は入力必須です。',
            'description.max' => '商品説明は255以内で入力してください。',
        ];
    }
}
