@component('mail::message')
# VALIDATION COMMANDE TOKOSS MARKET

Bonjour,

Vous avez une nouvelle commande de la plateforme TOKOSS MARKET.

Pour terminer vos commandes :

@component('mail::button', ['url' => route('connexion'), 'color' => 'success'])
CLIQUEZ ICI
@endcomponent

Cordialement.<br>
{{ config('app.name') }}
@endcomponent
