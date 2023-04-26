<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberUpdateInfoRequest extends FormRequest
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
        //    dd($this->route('member'));
        return [

            'password' => 'nullable|min:8|max:25|confirmed',
            'current_password' => 'nullable|min:8|max:25',
            'phone' => ['nullable', 'regex:/^(05)\d{8}$/', Rule::unique('users')->ignore($this->member)],
            // 'validate_password' => 'required_with:new_password|same:new_password|min:6|max:25'
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed' => __('Password does not match'),
            'password.min' => __('Password must not be less than 8 digits'),
            'password.max' => __('Password must not be greater than 25 numbers'),
            'phone.regex' =>  __('Phone number must start with 05 and contain ten numbers'),
            // 'validate_password:same'=> 'كلمة المرور غير مطابقه',
            // 'validate_password.required_with' => 'حقل كلمة تلأكيد كلمة مطلوب إدخالة',
        ];
    }
}
