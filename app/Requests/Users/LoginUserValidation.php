<?php

namespace App\Requests\Users;

use App\Requests\BaseRequestFormApi;

class LoginUserValidation extends BaseRequestFormApi
{

    public function rules(): array
    {
        return [
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|max:30',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
