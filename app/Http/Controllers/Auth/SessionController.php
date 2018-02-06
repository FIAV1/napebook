<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthenticateUser;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class SessionController extends Controller
{

    use ThrottlesLogins;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    /**
     * Redirect the user to the login view
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        return redirect()->route('index');
    }

    /**
     * Create a new session for the user
     *
     * @param AuthenticateUser $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(AuthenticateUser $request)
    {

        //If user is active
        if (Auth::attempt([
            'email' => $request->input('login_email'),
            'password' => $request->input('login_password'),
            'active' => true,
            ],
            $request->input('remember'))
        ) {

            // The user is active, not suspended, and exists.
            return redirect()->intended(route('home'));
        }

        if ($user = User::where('email', $request->input('login_email'))
            ->where('active', false)
            ->first()
        ) {

            //The user is suspended
            session()->flash('type', 'warning');
            session()->flash('message', 'Account non verificato, controlla la mail prima di accedere');

            return redirect()->route('index');
        }

        //The user doesn't exists or has submitted wrong credentials
        return redirect()->route('index')->withErrors([
            'credentials' => 'Credenziali errate'
        ], 'login');

    }

    /**
     * Logout a user
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();

        return redirect()->route('index');
    }

}
