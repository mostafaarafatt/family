<?php

namespace App\Requests\Hotels;

use App\Requests\BaseRequestFormApi;

class HotelSearchValidation extends BaseRequestFormApi
{

    public function rules(): array
    {
        
        return [
            'cityCode'=>'required|string|min:2|max:10',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}
