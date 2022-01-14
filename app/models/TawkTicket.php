<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TawkTicket extends Model
{
    public function estadoTicket()
    {
        return $this->belongsTo(EstadoTicket::class);
    }

    public function agenteSolicitante()
    {
        // return $this->belongsTo(User::class, 'agente_solicitante_id', 'id');
        $usuario = $this->belongsTo(User::class, 'agente_solicitante_id', 'id')->get()->first();
        return $usuario->nombre." ".$usuario->apellido_paterno." ".$usuario->apellido_materno;
    }

    public function usuarioAsignado()
    {
        return $this->belongsTo(User::class, 'usuario_asignado_id', 'id');
    }

    public function nombreUsuarioAsignado()
    {
        $usuario = $this->belongsTo(User::class, 'usuario_asignado_id', 'id')->get()->first();
        return $usuario->nombre." ".$usuario->apellido_paterno." ".$usuario->apellido_materno;
    }

    // public function getUsuario(){
    //     return 
    // }

    public function scopeId($query, $id)
    {
        if ($id) {
            return $query->where('id', '=', $id);
            // return $query->where('id','LIKE','%$id%');
        }
    }
    public function scopeEstado($query, $estado)
    {
        if ($estado) {
            return $query->where('estado_ticket_id', '=', $estado);
            // return $query->where('id','LIKE','%$id%');
        }
    }
    public function scopeAgente($query, $agenteSolicitante)
    {
        if ($agenteSolicitante) {
            return $query->where('agente_solicitante_id', '=', $agenteSolicitante);
            // return $query->where('','LIKE','%$agenteSolicitante%');
        }
    }
    public function scopeCorreoUsuario($query, $correoUsuario)
    {
        if ($correoUsuario) {
            // return $query->where('id','=',$id);
            return $query->where('correo_solicitante', '=', $correoUsuario);
            // return $query->where('correo_solicitante', 'LIKE', '%$correoUsuario%');
        }
    }
    public function scopeUsuarioAsignado($query, $usuarioAsignado)
    {
        if ($usuarioAsignado) {
            return $query->where('usuario_asignado_id', '=', $usuarioAsignado);
            // return $query->where('id','LIKE','%$id%');
        }
    }
}
