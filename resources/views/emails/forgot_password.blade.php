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

Nous avons bien reçu votre demande de réinitialisation de mot de passe.

Si vous souhaitez réinitialiser votre mot de passe, veuillez cliquer sur le bouton ci-dessous :

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Réinitialiser mon mot de passe
@endcomponent

Si le bouton ne fonctionne pas, copiez et collez l'URL suivante dans votre navigateur :
[{{ url('reset/' . base64_encode($user->id)) }}]({{ url('reset/' . $user->remember_token) }})

Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet e-mail ou nous contacter si vous avez des questions.

Merci de faire partie de notre communauté !

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
