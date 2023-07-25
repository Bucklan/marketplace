<?php

namespace App\Services\Admin\Requests\Category;

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
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
            ];
    }
}
