<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelSearchRequest extends FormRequest
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
            'user_id' => 'required|string',
            'user_password' => 'required|string',
            'access' => 'required|string',
            'ip_address' => 'required|string',
            'checkin' => 'required|date|before_or_equal:checkout',
            'checkout' => 'required|date|after_or_equal:checkin',
            'city_name' => 'required|string|min:2|max:20',
            'country_name' => 'required|string|min:2|max:20',
            'occupancy' => 'required|array',
            'occupancy.*.room_no' => 'required|integer|min:1',
            'occupancy.*.adult' => 'required|integer|min:0',
            'occupancy.*.child' => 'required|integer|min:0',
            'occupancy.*.child_age' => 'required|array',
            'requiredCurrency' => 'required',
            'requiredLanguage' => 'nullable|string|min:1|max:20',
            'maxResult' => 'nullable|integer|min:20',

            // 'user_id' => 'required|string',
            // 'user_password' => 'required|string',
            // 'access' => 'required|string',
            // 'ip_address' => 'required|string',
            // 'checkin' => 'required|date|before_or_equal:checkout',
            // 'checkout' => 'required|date|after_or_equal:checkin',
            // 'city_name' => 'required|string|min:2|max:20',
            // 'country_name' => 'required|string|min:2|max:20',
            // 'room_no' => 'required|integer|min:1',
            // 'adult' => 'required|integer|min:0',
            // 'child' => 'required|integer|min:0',
            // 'child_age' => 'required|array',
            // 'requiredCurrency' => 'required|string',
            // 'requiredLanguage' => 'nullable|string|min:1|max:20',
            // 'maxResult' => 'nullable|integer|min:20',

        ];
    }
}
