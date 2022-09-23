@component('mail::message')
# Link de pago

Hola {{ $cliente->nombre }} {{ $cliente->apellido }} Tu celular ya esta reparado.
Puedes realizar el pago haciendo click en el siguiente boton.

@component('mail::button', ['url' => $url])
Pagar
@endcomponent

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent
