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
        Schema::create('productosws', function (Blueprint $table) {

          $table->engine="InnoDB";
          $table->bigIncrements('id');
          $table->string('titulo');
          $table->string('observacion')->nullable();
          $table->string('ps_pdf')->nullable();
          $table->date('fec_creacion')->nullable();

          $table->bigInteger('requerimientos_id')->unsigned();
          $table->foreign('requerimientos_id')->references('id')->on('requerimientos')->onDelete("cascade");

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
        Schema::dropIfExists('productosws');
    }
};
