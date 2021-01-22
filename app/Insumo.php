<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';

    protected $fillable = [
        'name',
        'marca',
        'costo',
        'usos',
        'fecha_caducidad',
        'descripcion',
        'status',
    ];


    //Relacion de uno a muchos => un insumo tiene muchos grupos_detalle_tipoExamen
    public function tipoExamenes()
    {
        return $this->belongsToMany(Grupos_detalle_tipoExamen::class, 'insumo_tipo_examen', 'insumo_id', 'tipoExamen_id');
    }
}
