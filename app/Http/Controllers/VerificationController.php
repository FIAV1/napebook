<?php

namespace App\Http\Controllers;

use App\User;

class VerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('guest');
    }

    /**
     * Handle an account confirmation request
     *
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($token)
    {
        /**
         * @TODO
         * try catch with token error page
         */
        User::where('email_token', $token)->firstOrFail()
            ->update(['email_token' => null, 'active' => true]);

        session()->flash('type', 'success');
        session()->flash('message', 'Account confermato con successo!');

        return redirect()->route('index');
    }
}
