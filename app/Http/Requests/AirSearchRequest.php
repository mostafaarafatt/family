<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "user_id" => 'required|string',
            "user_password" => 'required|string',
            "access" => 'required|string',
            "ip_address" => 'required|string',
            "requiredCurrency" => 'required|string',
            "journeyType" => 'required|string',
            "departureDate" => 'required|date',
            "returnDate" => 'nullable|date',
            "airportOriginCode" => 'required|string',
            "airportDestinationCode" => 'required|string',
            "class" => 'required|string',
            "adults" => 'required|integer',
            "childs" => 'required|integer',
            "infants" => 'required|integer'

        ];
    }
}
