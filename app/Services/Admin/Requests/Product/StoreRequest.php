<?php

namespace App\Services\Admin\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
//            'image' => 'required|image'
        ];
    }
}
