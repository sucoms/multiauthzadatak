<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserData extends FormRequest
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
            'name' => 'nullable',
            'surname' => 'nullable',
            'email' => 'email|nullable|unique:users',
            'phone' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'Molimo unesite svoju email adresu.',
            'phone.numeric' => 'Telefon može sadržavati samo brojeve.',
            'email.unique' => 'Ova email adresa se već koristi. Molimo unesite drugu email adresu.',
            'password.between:6,12' => 'Lozinka mora biti između 6 i 12 znakova.'
        ];
    }
}
