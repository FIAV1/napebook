<?php

namespace App\Listeners;

use App\Events\RegistrationEvent;
use App\Mail\VerifyRegistrationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegistrationEvent  $event
     * @return void
     */
    public function handle(RegistrationEvent $event)
    {
        \Mail::to($event->user->email)->send(new VerifyRegistrationEmail($event->user));
    }
}
