<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'post';
    
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
            'post-text' => 'required',
            'post-image' => 'mimes:jpg,jpeg,png'
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
            'post-text.required' => 'Il post non può essere vuoto',
            'post-image' => 'Formati immagine accettati: jpeg/jpg, png'
        ];
    }
}
