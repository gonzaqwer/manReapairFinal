<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Str;

class EmailConfirmacionPago extends Mailable
{
    use Queueable, SerializesModels;


    public $nroTransaccion;
    public $monto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $nroTransaccion, float $monto)
    {
        $this->nroTransaccion = $nroTransaccion;
        $this->monto = $monto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.emailConfirmacionPago')->subject('Información de Pagos desde su cuenta');
    }
}
