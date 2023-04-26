<?php

namespace App\Requests\Amadeus;

use App\Requests\BaseRequestFormApi;

class AmadeusAuthValidation extends BaseRequestFormApi
{
    public function rules(): array
    {
        return [
            'client_id' => 'required|string|max:100',
            'client_secret' => 'required|string|min:4|max:50',
            'grant_type' => 'required|string|max:40',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
