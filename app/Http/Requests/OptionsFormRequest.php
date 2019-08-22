<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionsFormRequest extends FormRequest
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
            'option_name'         => 'required|min:5',
            'option_v.vas'      => 'required|min:5'
        ];
    }

    public function messages(){
        return [
            'option_name.required'       => 'Ito ay importante'
        ];
    }
}
