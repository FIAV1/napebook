<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The user who requested the reset
     *
     * @var \App\User $user
     */
    public $user;

    /**
     * The token validation for the request to change the password
     *
     * @var string $token
     */
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Napebook | Password Reset')
            ->markdown('emails.account.reset_password',[
                'name' => $this->user->name,
                'token' => $this->token
            ]);
    }
}
