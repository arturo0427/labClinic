<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';

    protected $fillable = [
        'user_id',
        'medico_id',
        'precio',
    ];

//    Relaciones
    public function grupos_detalles_tiposExamenes()
    {
        return $this->belongsToMany(Grupos_detalle_tipoExamen::class, 'consulta_grupos', 'consultas_id', 'grupos_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function resultadoConsultas()
    {
        return $this->hasMany(ResultadoConsulta::class);
    }

}
