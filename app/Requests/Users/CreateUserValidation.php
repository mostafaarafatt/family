<?php

namespace App\Requests\Users;

use App\Requests\BaseRequestFormApi;

class CreateUserValidation extends BaseRequestFormApi
{

    public function rules(): array
    {
        
        return [
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|max:30|confirmed',
            'gender' => 'required|string|max:10',
            'address'=>'required|string|max:255',
            //'otpCode'=>'required|string|min:4|max:4'
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
