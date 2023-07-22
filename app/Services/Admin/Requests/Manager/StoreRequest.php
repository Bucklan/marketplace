<?php

namespace App\Services\Admin\Requests\Manager;

use App\Enums as Enums;
use BenSampo\Enum\Rules\EnumValue;
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255|min:8|confirmed',
            'permissions' => 'required|array',
            'permission.*' => [
                'required', 'string', new EnumValue(Enums\User\Permission::class),
            ]
        ];
    }
}
