<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoTransferencia extends Model
{
    protected $fillable = ['banco', 'nro_cuenta', 'tipo_cuenta', 'titular', 'correo', 'telefono'];
}
