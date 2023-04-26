<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirFlightBookRequest extends FormRequest
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
            "requiredCurrency" => 'required|string',
            "journeyType" => 'required|string',
            "departureDate" => 'required|string',
            "returnDate" => 'nullable|string',
            "class" => 'required|string',
            "adults" => 'required|integer',
            "childs" => 'required|integer',
            "infants" => 'required|integer',
            "price" => 'required|integer',
            "currency" => 'required|string',
            "originAirportName" => 'required|string',
            "destinationAirportName" => 'required|string',
            "totalStops" => 'required',
            "flightNumber" => 'required',
            "journeyDuration" => 'required',
            "marketingAirlineName" => 'required'
        ];
    }
}
