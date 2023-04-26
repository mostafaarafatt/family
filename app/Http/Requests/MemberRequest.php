<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|max:30|confirmed',
            'phone' => 'required|regex:/^(05)\d{8}$/|unique:admins',
            'member_type' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'phone.regex' =>  __('Phone number must start with 05 and contain ten numbers'),
            'phone.required' =>  __('phone required'),
            'name.required' => __('First name is required'),
            'email.required' => __('email is required'),
            'email.unique' => __('email is used before, create another'),
            'password.required' => __('password is required'),
            'member_type.required' => __('permission type is required'),
            'password.min' => __('password length should not be less than 8 charaters'),
            'password.max' => __('password length should not be max than 30 charaters'),


            
           
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
            // 'fname' => 'nullable|string|max:255',
            // 'email' => 'nullable|string|email|max:255',
            // 'phone' => 'nullable|string|unique:users,phone,' . $this->route('user'),
            // 'nickName' => 'nullable|string|max:255',
            // 'lname' => 'nullable|string|max:255',
            // 'mname' => 'nullable|string|max:255',
            // 'dateOfBirth' => 'nullable',
            // 'nationality' => 'nullable|string|max:255',
            // 'passport' => 'nullable|string|min:9|max:9',
            // 'endPassportDate' => 'nullable',
        ];
    }
}
