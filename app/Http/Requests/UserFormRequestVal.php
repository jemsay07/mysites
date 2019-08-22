<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequestVal extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'   => 'required|string|max:20',
            'last_name'    => 'required|string|max:20',
            'birthday'     => 'required|nullable|before:today',
            'age'          => 'required|numeric',
            'address' => 'required',
            'contact_number' => 'required|numeric',
            'email' => 'required|email|nullable',
            // 'social_meta.*.sm_link' => 'required|url|distinct|min:5',
            'tertiary.university' => 'required|min:3',
            'tertiary.qualify_uni' => 'required|not_in:none',
            'tertiary.course_uni' => 'required|string|min:5',
            'tertiary.grad_end_uni' => 'required|nullable|before:today',
            'tertiary.address_uni' => 'required|min:5',
        ];
    }

    public function messages(){
        return [
            'first_name.max'     => 'First name must be not more than 20 characters.',
            'last_name.max'      => 'Last name must be not more than 20 characters.',
            'age.numeric'      => 'Age must be a numeric numbers.',
            'contact_number.numeric'  => 'Contact Number must be a numeric numbers.',
            'email.required'  => 'The email field is required.',
            // 'social_meta.*.sm_link.distinct' => 'This item must be unique.',
            // 'social_meta.*.sm_link.url' => 'Check if its url.',
            'tertiary.university.required'  => 'The institute/university field is required.',
            'tertiary.qualify_uni.required'  => 'The qualification field is required.',
            'tertiary.course_uni.required'  => 'The course field is required.',
            'tertiary.grad_end_uni.required'  => 'The graduation date field is required.',
            'tertiary.address_uni.required'  => 'The location field is required.',
        ];
    }
}
