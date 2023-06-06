<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'user_id' => 'required|numeric|exists:users,id',
        ];
    }
}
