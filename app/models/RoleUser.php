<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->get()->first();
    }
}
