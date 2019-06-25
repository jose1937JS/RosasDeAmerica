<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPagoMovil extends Model
{
    protected $fillable = ['cedula', 'cod_banco', 'telefono'];
}
