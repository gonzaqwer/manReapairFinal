@component('mail::message')
{{-- # Garantia --}}

Hola {{ $cliente->nombre }} {{ $cliente->apellido }} ya puedes pasar a retirar tu equipo.

Muchas gracias,<br>
{{ config('app.name') }}
@endcomponent