<?php

namespace App\Mail;

use App\Models\Cliente;
use App\Models\OrdenDeServicio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RetirarGarantia extends Mailable
{
    use Queueable, SerializesModels;

    
    public $subjet = "Reparacion lista para retirar";
    public Cliente $cliente;
    public OrdenDeServicio $orden_de_servicio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente, OrdenDeServicio $orden_de_servicio)
    {
        $this->cliente = $cliente;
        $this->orden_de_servicio = $orden_de_servicio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reingresoListo')->subject("Orden de servicio - LISTA PARA ENTREGA");;
    }
}
