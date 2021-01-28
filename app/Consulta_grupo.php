<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta_grupo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'consulta_grupos';


    protected $fillable = [];
}
