<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "Perfil";

    protected $primaryKey = "IdPerfil";

    public $incrementing = true;

    public $timestamps = false;
}
