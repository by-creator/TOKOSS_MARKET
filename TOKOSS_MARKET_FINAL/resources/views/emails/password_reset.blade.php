@component('mail::message')
# RÉINITIALISATION DU MOT DE PASSE

Bonjour {{$lastname}} {{$firstname}},

Vous avez demandé une réinitialisation de votre mot de passe TOKOSS MARKET.

Pour réinitialiser votre mot de passe :

@component('mail::button', ['url' => route('connexion.edit'), 'color' => 'success'])
CLIQUEZ ICI
@endcomponent

Cordialement.<br>
{{ config('app.name') }}
@endcomponent
