<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoConsulta extends Model
{
    protected $table = 'resultado_consultas';

    protected $fillable = [
        'resultado',
        'slug',
        'consulta_id',
    ];

    //Relaciones

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }
}
