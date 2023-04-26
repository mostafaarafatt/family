<?php

namespace App\Requests\Users;

use App\Requests\BaseRequestFormApi;

class VerifyPhone extends BaseRequestFormApi
{

    public function rules(): array
    {
        return [
            'phone'=>'required|numeric',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
