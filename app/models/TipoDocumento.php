<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public function scopeNombre($query,$nombre){
        if($nombre){
            return  $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }
}
