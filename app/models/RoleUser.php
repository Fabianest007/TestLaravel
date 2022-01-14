<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public function usuario()
    {
        $user = $this->belongsTo(User::class, 'user_id', 'id')->get()->first();
        return $user->nombre . " " . $user->apellido_paterno . " " . $user->apellido_materno;
    }
}
