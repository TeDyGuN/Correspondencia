<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibidos extends Model
{
    protected $table = 'recibidos';
    protected $fillable = [
        'id_recibido', 'tipo', 'f_creacion', 'codigo', 'remitente', 'referencia',
        'adjunto', 'file', 'observacion', 'estado', 'id_user', 'id_user_destino'
    ];

}
