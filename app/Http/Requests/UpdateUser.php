<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'profile';
    
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
            'password' => 'sometimes|string|min:6|confirmed',
            'birthday' => 'date',
            'phone' => 'numeric',
            'sex' => 'required|alpha|max:1',
            'bio' => 'between:0,250',
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
            'password.confirmed' => 'Le password inserite non corrispondono',
            'password.min' => 'Inserire una password di almeno 6 caratteri',
            'birthday' => 'Inserire una data valida',
            'phone' => 'Inserire un numero di telefono valido',
            'sex' => 'Inserire un sesso valido',
            'bio.between' => 'La biografia deve avere massimo 250 caratteri',
        ];
    }
}
