<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{

    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'register';
    
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
            'name' => 'required|alpha_num|between:1,50',
            'surname' => 'required|alpha_num|between:1,50',
            'registration_email' => 'required|email|unique:users,email',
            'registration_password' => 'required|string|min:6|confirmed',
            'birthday' => 'required|date',
            'sex' => 'required|alpha|max:1'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.alpha_num' => 'Il nome deve essere alfanumerico',
            'name.between' => 'Il nome deve avere massimo di 50 caratteri',
            'surname.required' => 'Il cognome è obbligatorio',
            'surname.alpha_num' => 'Il cognome deve essere alfanumerico',
            'surname.between' => 'Il cognome deve avere massimo di 50 caratteri',
            'registration_email.required' => 'È necessario fornire una email',
            'registration_email.unique' => 'Questa mail risulta già registrata',
            'registration_email.email' => 'Inserire un indirizzo mail valido',
            'registration_password.required' => 'La password è obbligatoria',
            'registration_password.confirmed' => 'Le password inserite non corrispondono',
            'registration_password.min' => 'Inserire una password di almeno 6 caratteri',
            'birthday' => 'Inserire una data valida',
            'sex' => 'Inserire un sesso valido'
        ];
    }
}
