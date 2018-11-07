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
            'email' => 'email|required|unique:users',
            'phone' => 'nullable|numeric',
            'password' => 'required_with:password_confirmation|same:password_confirmation|between:6,12',
            'password_confirmation' => 'between:6,12'
        ];
    }

    /**
     * Get the messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Molimo unesite svoje ime.',
            'surname.required' => 'Molimo unesite svoje prezime.',
            'password.required' => 'Molimo unesite svoju lozinku.',
            'password_confirmation' => 'Molimo unesite istu lozinku.',
            'email.email' => 'Molimo unesite svoju email adresu.',
            'phone.numeric' => 'Telefon može sadržavati samo brojeve.',
            'email.unique' => 'Ova email adresa se već koristi. Molimo unesite drugu email adresu.',
            'password.same' => 'Lozinke se moraju podudarati.',
            'password_confirmation' => 'Lozinke se moraju podudarati.',
            'password.between' => 'Lozinka mora biti između 6 i 12 znakova.',
            'password_confirmation.between' => 'Lozinka mora biti između 6 i 12 znakova.'
        ];
    }
}
