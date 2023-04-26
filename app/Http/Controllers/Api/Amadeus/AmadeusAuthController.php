<?php

namespace App\Http\Controllers\Api\Amadeus;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\TokenRequest;
use App\Requests\Amadeus\AmadeusAuthValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmadeusAuthController extends BaseController
{
    public function authroization(TokenRequest $request)
    {
        $validated = $request->validated();

        $response = Http::asForm()->withOptions([
            'verify' => false,
        ])->post('https://test.api.amadeus.com/v1/security/oauth2/token', [
            'grant_type'=>$request->safe()->grant_type,
            'client_id'=>$request->safe()->client_id,
            'client_secret'=>$request->safe()->client_secret,
           
        ]);
       
        return $response->json();
    }

    
}
