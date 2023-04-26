<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FqaRequest extends FormRequest
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
            'question' => 'required|string|min:5|max:400|unique:fqas,question',
            'answer' => 'required|string|min:5|max:400',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' =>  __('question required'),
            'question.unique' =>  __('This question already exits'),
            'answer.required' => __('answer required'),
            'question.min' =>  __('question in very minimum'),
            'answer.min' => __('answer in very minimum'),
            'question.max' =>  __('question in very maximum'),
            'answer.max' => __('answer in very maximum'),
           
        ];
    }
}
