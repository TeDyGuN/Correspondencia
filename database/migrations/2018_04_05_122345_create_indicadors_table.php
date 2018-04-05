<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('indicador');
            $table->string('unidad');
            $table->integer('id_proyecto')->unsigned();
            $table->foreign('id_proyecto')->references('id')->on('proyectos');

            $table->integer('a_planificado')->unsigned();
            $table->integer('a_ejecutado')->unsigned();
            $table->integer('f_planificado')->unsigned();
            $table->integer('f_ejecutado')->unsigned();
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
        Schema::dropIfExists('indicadors');
    }
}
