Hola {{ $user->name }}
Has cambiado la dirección de correo. Por favor verifícala la nueva dirección
usando el siguiente enlace:

{{ route('verify', $user->verification_token) }}