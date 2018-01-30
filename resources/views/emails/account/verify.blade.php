@component('mail::message')
# Ciao {{ $name }}!

Grazie per esserti registrato a Napebook. Clicca sul pulsante qui in basso per confermare il tuo account e cominciare a navigare.


@component('mail::button', ['url' => route('verify', ['token' => $token])])
Accedi
@endcomponent

A presto,<br>
Il team di {{ config('app.name') }}
@endcomponent
