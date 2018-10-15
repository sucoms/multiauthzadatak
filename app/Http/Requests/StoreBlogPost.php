<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'email|required',
            'phone' => 'nullable',
            'password' => 'required|between:6,12'
        ];
    }

    //uzeto iz FormRequest.php
    public function messages()
    {
        return [
            'name.required' => 'We need your name.',
            'surname.required' => 'We need your last name.',
            'password.required' => 'We need your password.',
            'email.email' => 'We need a valid email address.'
        ];
    }
}
