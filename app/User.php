<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellido',
        'sexo',
        'email',
        'age',
        'cedula',
        'celular',
        'telefono',
        'fecha_nacimiento',
        'password',
        'direccion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    Relacion entre usuario y reservacion
    public function reservations()
    {
//        Este usuario tiene muchas reservaciones
        return $this->hasMany('App\Reservation');
    }

    public function consultas()
    {
        return $this->hasMany('App\Consulta', 'user_id');
    }
}
