<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupos_examen extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'grupos_examen';

    protected $fillable = [
        'name',
        'description',
    ];





}
