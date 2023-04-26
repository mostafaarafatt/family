<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            'fname' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255',
            'phone' => 'sometimes|numeric',
            'password' => 'sometimes|string|min:6|max:30|confirmed',
            'gender' => 'sometimes|string|max:10',
            'address'=>'sometimes|string|max:255',
            'nickName' => 'sometimes|string|max:255',
            'lname' => 'sometimes|string|max:255',
            'mname' => 'sometimes|string|max:255',
            'dateOfBirth' => 'sometimes',
            'nationality' => 'sometimes|string|max:255',
            'passport' => 'sometimes|numeric|min:9|max:9',
            'endPassportDate'=>'sometimes',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
