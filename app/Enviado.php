<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enviado extends Model
{
    protected $table = 'enviados';
    protected $fillable = [
        'id_enviado', 'tipo', 'codigo', 'emitente', 'referencia',
        'adjunto', 'file', 'observacion', 'id_user', 'id_user_destino'
    ];
}
