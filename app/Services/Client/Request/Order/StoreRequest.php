<?php

namespace App\Services\Client\Request\Order;

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
            'products' => ['required', 'array', 'min:1'],
            'products.*.product_id' => ['required', 'integer'],
            'products.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }
}
