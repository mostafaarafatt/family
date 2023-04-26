<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelOfferRequest extends FormRequest
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
            'sessionId' => 'required|string',
            'maxResult' => 'required|integer',
            'filters' => 'sometimes|array',
            'filters.price' => 'nullable|array',
            'filters.price.min' => 'nullable|integer',
            'filters.price.max' => 'nullable|integer',
            'filters.rating' => 'nullable|string',
            'filters.tripadvisorRating' => 'nullable|string',
            'filters.propertyType' => 'nullable|string',
            'filters.facility' => 'nullable|string',
            'filters.sorting' => 'nullable|string',
            'filters.sorting' => 'nullable|string',
            'filters.locality' => 'nullable|string',
        ];

        
    }
}
