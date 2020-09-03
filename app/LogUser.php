<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogUser extends Model
{
    protected $fillable = [
        'datahora', 'id_caixa', 'id_usuario',
    ];
}
