<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrationEvent;
use App\User;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;

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
     * Redirect the user to the registration view
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        return redirect()->route('index');
    }

    /**
     * Store a new user into the database
     *
     * @param StoreUser $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreUser $request)
    {

        $request->flashExcept('password');

        /**
         * Create a new User
         *
         * @var User $user
         */
        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('registration_email'),
            'password' => bcrypt($request->input('registration_password')),
            'birthday' => $request->input('birthday'),
            'sex' => $request->input('sex'),
            'email_token' => str_random(30)
        ]);

        //Dispatch the RegistrationEvent in order to send the verification email to the user
        event(new RegistrationEvent($user));

        //Flash a session message
        session()->flash('type', 'warning');
        session()->flash('message', 'Controlla la tua mail per terminare la registrazione');

        //Redirect '/'
        return redirect()->route('index');

    }
}
