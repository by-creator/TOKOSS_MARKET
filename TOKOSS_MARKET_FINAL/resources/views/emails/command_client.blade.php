@component('mail::message')
# VALIDATION COMMANDE TOKOSS MARKET

Bonjour {{$lastname}} {{$firstname}},

Votre commande a été enregistrée avec succès et sera traitée dans les 24h qui suivent.

Pour continuer vos achats :

@component('mail::button', ['url' => route('index'), 'color' => 'success'])
CLIQUEZ ICI
@endcomponent

Cordialement.<br>
{{ config('app.name') }}
@endcomponent
