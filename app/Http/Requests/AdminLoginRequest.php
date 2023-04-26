<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|exists:admins,email',
            'password' => 'required|min:8|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('email is required'),
            'email.exists' => __('email or password not correct'),
            'password.required' => __('password is required'),
            'password.min' => __('password length should not be less than 8 charaters'),
            'password.max' => __('password length should not be max than 30 charaters'),
        ];
    }
}
