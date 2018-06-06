<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
          $table->increments('id');
          $table->date('fecha');
          $table->string('hora_in');
          $table->string('hora_alm_in');
          $table->string('hora_alm_out');
          $table->string('hora_out');
          $table->string('justificativo')->nullable();
          $table->integer('id_user')->unsigned();
          $table->foreign('id_user')->references('id')->on('users');
          $table->time('atraso');
          $table->time('htrabajado');
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
        Schema::dropIfExists('horarios');
    }
}
