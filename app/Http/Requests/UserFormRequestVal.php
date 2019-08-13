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
        ];
    }

    public function messages(){
        return [
            'first_name.max'     => 'First name must be not more than 20 characters.',
            'last_name.max'      => 'Last name must be not more than 20 characters.',
            'age.numeric'      => 'Age must be a numeric numbers.',
            'contact_number.numeric'  => 'Contact Number must be a numeric numbers.',
            'email.required'  => 'Required the correct email.',
        ];
    }
}
