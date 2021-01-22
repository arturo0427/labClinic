<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta_grupo extends Model
{
    protected $table = 'consulta_grupos';

    protected $fillable = [
        'resultado',
    ];
}
