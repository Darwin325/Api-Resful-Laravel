@component('mail::message')
    # Hola {{ $user->name }}

    Has cambiado la dirección de correo. Por favor verifícala la nueva dirección
    usando el siguiente enlace:

    @component('mail::button', ['url' => route('verify', $user->verification_token)])
        Confirmar mi cuenta
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent