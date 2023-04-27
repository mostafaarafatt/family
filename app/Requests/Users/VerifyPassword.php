<?php

namespace App\Requests\Users;

use App\Requests\BaseRequestFormApi;

class VerifyPassword extends BaseRequestFormApi
{

    public function rules(): array
    {
        return [
            'otpCode' =>'required',
            'phone'=>'required|numeric',
            'password' => 'required|string|min:6|max:30|confirmed',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
