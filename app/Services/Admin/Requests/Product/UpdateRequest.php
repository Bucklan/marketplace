<?php

namespace App\Services\Admin\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function boot()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => ' required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|numeric|exists:categories,id',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ];
    }
}
