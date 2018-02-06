@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => route('index')])
        {{ config('app.name') }}
    @endcomponent
@endslot

# Ciao {{ $name }}!

Ti mandiamo questa email perchè abbiamo ricevuto una richiesta di reset della password per il tuo account.

@component('mail::button', ['url' => route('password.reset', $token)])
    Reset Password
@endcomponent

Se non riconosci questa azione puoi ignorare questa email.

A presto,<br>
Il team di {{ config('app.name') }}

@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    @endcomponent
@endslot

@endcomponent