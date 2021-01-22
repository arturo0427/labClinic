<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $fillable  = [
        'title',
        'start',
        'end',
        'hora_inicio',
        'hora_fin',
        'des_diagnostico',
        'status',
        'user_id',
    ];

// Relacion entre reservacion y usuario
    public function user()
    {
//        Esta reservacion perteneca a un usuario
        $this->belongsTo('App\User');
    }
}
