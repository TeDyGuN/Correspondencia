<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = 'procesos';
    protected $fillable = [
        'accion', 'estado', 'referencia', 'id_recibido', 'id_user', 'id_user_destino'
    ];
}
