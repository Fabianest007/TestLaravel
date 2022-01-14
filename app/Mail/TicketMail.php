<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;

    private $ticket;
    public $subject = 'Se le ha asignado un nuevo ticket';
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.ticketAsignado', [
            'ticket' => $this->ticket
        ]);
    }

}
