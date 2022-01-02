<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
