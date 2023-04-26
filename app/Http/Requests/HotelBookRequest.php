<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelBookRequest extends FormRequest
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
            'sessionId' => 'required|string|min:1|max:300',
            'productId' => 'required|string|min:1|max:100',
            'tokenId' => 'required|string|min:1|max:100',
            'rateBasisId' => 'required|string|min:1|max:100',
            'clientRef' => 'required|string|min:1|max:100',
            'customerEmail' => 'required|string|min:1|max:100',
            'customerPhone' => 'required|string|min:1|max:100',
            'bookingNote' => 'required|string|min:1|max:100',
            'paxDetails' => 'required|array',
            'paxDetails.*.room_no' => 'required',
            'paxDetails.*.adult' => 'required|array',
            'paxDetails.*.adult.title' => 'required|array',
            'paxDetails.*.adult.firstName' => 'required|array',
            'paxDetails.*.adult.lastName' => 'required|array',
            'paxDetails.*.child' => 'nullable|array',
            'paxDetails.*.child.title' => 'nullable|array',
            'paxDetails.*.child.firstName' => 'nullable|array',
            'paxDetails.*.child.lastName' => 'nullable|array',
            
        ];
    }
}
