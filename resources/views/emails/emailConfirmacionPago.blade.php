@component('mail::message')
# AVISO DE PAGO
Se registro un pago desde tu cuenta.

<h4>Detalle de la Operación:</h4><br><br>
Importe: ${{number_format($monto, 2, ',', '.')}} <br>
Número de transacción: {{$nroTransaccion}}


IMPORTANTE: Este mail no es válido como comprobante de la operación realizada.



Cordialmente,
Banco Dev
@endcomponent