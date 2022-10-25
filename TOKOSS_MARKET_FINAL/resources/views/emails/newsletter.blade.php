@component('mail::message')
# NEWSLETTER

Bonjour,

Merci pour votre inscrciption à nore newsletter concernant nos mises à jour par e-mail sur nos dernières boutiques et offres spéciales.

Pour continuer vos achats :

@component('mail::button', ['url' => route('index'), 'color' => 'success'])
CLIQUEZ ICI
@endcomponent

Cordialement.<br>
{{ config('app.name') }}
@endcomponent