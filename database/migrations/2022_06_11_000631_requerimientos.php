<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('requerimientos', function (Blueprint $table) {

          $table->engine="InnoDB";
          $table->bigIncrements('id');
          $table->date('fec_creacion');
          $table->date('fec_entrega');
          $table->string('titulo');
          $table->string('descripcion');
          $table->string('observacion')->nullable();
          $table->string('rq_pdf')->nullable();
          $table->date('fec_final')->nullable();

          $table->bigInteger('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete("cascade");

          $table->bigInteger('empleados_id')->unsigned();
            $table->foreign('empleados_id')->references('id')->on('empleados')->onDelete("cascade");

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
        //
        Schema::dropIfExists('requerimientos');
    }
};
