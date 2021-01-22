<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos_detalle_tipoExamen extends Model
{
    protected $table = 'grupos_detalle_tipo_examen';

    protected $fillable = [
        'name',
        'description',
        'grupos_id',
    ];

    public function grupos_examen()
    {
        return $this->belongsTo(Grupos_examen::class, 'grupos_id');
    }

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class, 'consulta_grupos', 'grupos_id', 'consultas_id');
    }

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class, 'insumo_tipo_examen', 'tipoExamen_id', 'insumo_id');
    }
}
