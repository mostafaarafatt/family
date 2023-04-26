<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDashboardRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {

        //dd(true);
        return [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/^(05)\d{8}$/|unique:users,phone',
            'influent_phone' => 'nullable|regex:/^(05)\d{8}$/|unique:users,influent_phone',
            'password' => 'required|string|min:6|max:30|confirmed',
            'user_type' => 'required|string|max:10',
        ];

        
    }

    public function messages(): array
    {
        return [
            'phone.regex' =>  __('Phone number must start with 05 and contain ten numbers'),
            'influent_phone.regex' =>  __('Phone number of influent must start with 05 and contain ten numbers'),
            'phone.required' =>  __('phone required'),
            'name.required' => __('First name is required'),
            // 'email.required' => __('email is required'),
            'password.required' => __('password is required'),
            'user_type.required' => __('gender is required'),
        ];
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/^(05)\d{8}$/|unique:users,phone,' .$this->route('user'),
            // 'influent_phone' => 'regex:/^(05)\d{8}$/|unique:users'.$this->route('user'),
            'user_type' => 'required|string|max:10',

            
        ];
    }
}
