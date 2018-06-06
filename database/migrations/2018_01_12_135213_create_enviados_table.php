<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('enviados', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_enviado')->default(0);
          $table->enum('tipo', ['Carta', 'Recibo', 'Factura', 'Otros']);
          $table->string('codigo');
          $table->string('emitente');
          $table->string('referencia');
          $table->string('adjunto');
          $table->string('file');
          $table->string('observacion');
          //Valores repetidos para DataTables
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
        Schema::dropIfExists('enviados');
    }
}
