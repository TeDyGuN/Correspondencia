<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('accion', ['Archivar', 'Derivar', 'Reg. Correspondencia', 'Rev. Informacion']);
            $table->enum('estado', ['Abierto', 'Cerrado']);
            $table->string('referencia');
  	        $table->integer('id_recibido')->unsigned();
  	        $table->foreign('id_recibido')->references('id')->on('recibidos');
  	        $table->integer('id_user')->unsigned();
  	        $table->foreign('id_user')->references('id')->on('users');
  	        $table->integer('id_user_destino')->unsigned();
  	        $table->foreign('id_user_destino')->references('id')->on('users');
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
        Schema::dropIfExists('procesos');
    }
}
