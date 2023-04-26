<?php

namespace App\Requests\Users;

use App\Requests\BaseRequestFormApi;

class CompleteUserValidation extends BaseRequestFormApi
{

    public function rules(): array
    {
        return [
            'nickName' => 'required|string|max:255',
            'lname' => 'sometimes|string|max:255',
            'mname' => 'sometimes|string|max:255',
            'dateOfBirth' => 'required',
            'nationality' => 'required|string|max:255',
            'passport' => 'required|digits:9',
            'endPassportDate'=>'required'
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
