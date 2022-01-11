<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MensajesTicket extends Model
{
    public function usuario()
    {
        $usuario = $this->belongsTo(User::class, 'usuario_id', 'id')->get()->first();
        return $usuario->nombre." ".$usuario->apellido_paterno." ".$usuario->apellido_materno;
    }

    public function estadoTicket()
    {
        return $this->belongsTo(EstadoTicket::class, 'estado_ticket', 'id');
    }

}
