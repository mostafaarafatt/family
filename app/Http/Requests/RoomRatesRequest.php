<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRatesRequest extends FormRequest
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
            'hotelId' => 'required|string|min:1|max:100',
        ];
    }
}
