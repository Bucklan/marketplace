<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'product_id' => 'required|numeric|exists:products,id',
            'number' => 'required|numeric',
            'status' => 'required|max:255',
        ];
    }
}
