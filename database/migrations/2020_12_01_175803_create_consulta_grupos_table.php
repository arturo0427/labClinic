<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_grupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultas_id')->constrained('consultas')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('grupos_id')->constrained('grupos_detalle_tipo_examen')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta_grupos');
    }
}
