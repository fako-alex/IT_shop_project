@php
    // Obtenir l'heure actuelle
    $hour = \Carbon\Carbon::now()->format('H');

    // Définir la salutation en fonction de l'heure
    if ($hour < 12) {
        $greeting = 'Bonjour';
    } elseif ($hour < 18) {
        $greeting = 'Bon après-midi';
    } else {
        $greeting = 'Bonsoir';
    }
@endphp

@component('mail::message')
# {{ $greeting }}, **{{$user->name}}**

Bienvenue dans notre boutique !

Vous êtes presque prêt à commencer à profiter de nos services. Il ne vous reste plus qu'à vérifier votre adresse e-mail en cliquant sur le bouton ci-dessous.

@component('mail::button', ['url' => url('active/' . base64_encode($user->id))])
Vérifier mon e-mail
@endcomponent

Si vous ne parvenez pas à cliquer sur le bouton, copiez et collez l'URL suivante dans votre navigateur :
[{{ url('active/' . base64_encode($user->id)) }}]({{ url('active/' . base64_encode($user->id)) }})

Merci de faire partie de notre communauté !

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
