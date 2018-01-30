<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Store a new user into the database.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        //Validazione
        $rules = [
            'name' => 'required|alpha_num|between:1,50',
            'surname' => 'required|alpha_num|between:1,50',
            'registration_email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'birthday' => 'required|date',
            'sex' => 'required|alpha|max:1'
        ];

        $messages = [
            'name.required' => 'Il nome è obbligatorio',
            'name.alpha_num' => 'Il nome deve essere alfanumerico',
            'name.between' => 'Il nome deve avere massimo di 50 caratteri',
            'surname.required' => 'Il cognome è obbligatorio',
            'surname.alpha_num' => 'Il cognome deve essere alfanumerico',
            'surname.between' => 'Il cognome deve avere massimo di 50 caratteri',
            'registration_email.required' => 'È necessario fornire una email',
            'registration_email.unique' => 'Questa mail risulta già registrata',
            'password.required' => 'La password è obbligatoria',
            'password.confirmed' => 'Le password inserite non corrispondono',
            'password.min' => 'Inserire una password di almeno 6 caratteri',
            'birthday' => 'Inserire una data valida',
            'sex' => 'Inserire un sesso valido'
        ];
        $this->validate(request(), $rules, $messages);

        request()->flashExcept('password');

        //Creo lo user
        $user = User::create([
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('registration_email'),
            'password' => bcrypt(request('password')),
            'birthday' => request('birthday'),
            'sex' => request('sex'),
            'active' => 0,
            'email_confirmed' => 0,
            'email_token' => 'diobubu'
            //Generare mail token
        ]);
        //Mando mail di conferma

        //Redirect '/'
        return redirect()->route('index');

    }
}
