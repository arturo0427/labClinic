<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumoTipoExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo_tipo_examen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insumo_id')->constrained('insumos')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipoExamen_id')->constrained('grupos_detalle_tipo_examen')
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
        Schema::dropIfExists('insumo_tipo_examen');
    }
}
