<?php

namespace App\Requests\Users;

use App\Requests\BaseRequestFormApi;

class CodeValidation extends BaseRequestFormApi
{

    public function rules(): array
    {
        return [
            'phone'=>'required|numeric',
            'otpCode' => 'required|string|min:4|max:4',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
