<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolucionTicketMail extends Mailable
{
    use Queueable, SerializesModels;
    private $ticket;
    private $mensaje;
    public $subject = 'Solución a su solicitud - MuySimple';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $mensaje)
    {
        $this->ticket = $ticket;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.ticketSolucionado', [
            'ticket' => $this->ticket,
            'mensaje' => $this->mensaje
        ]);
    }
}
