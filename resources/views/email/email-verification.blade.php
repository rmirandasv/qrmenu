@component('mail::message')
# Verificación de correo electronico

Hola {{ $user->name }}, gracias por registrarte en **QR Menus**. Por favor haz click
en el siguiente enlae para validar tu cuenta.

@component('mail::button', ['url' => $signedUrl, 'color' => 'purple'])
Validar cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent