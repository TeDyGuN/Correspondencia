<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecibidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibidos', function (Blueprint $table) {
            // $table->increments('id');
            // $table->integer('id_recibido')->default(0);
            // $table->enum('tipo', ['Carta', 'Recibo', 'Factura', 'Otros']);
            // $table->enum('accion', ['Archivar', 'Derivar', 'Reg. Correspondencia', 'Rev. Informacion']);
            // $table->date('f_creacion');
            // $table->string('codigo');
            // $table->string('remitente');
            // $table->string('referencia');
            // $table->string('adjunto');
            // $table->string('file');
            // $table->string('observacion');
            // $table->enum('estado', ['Abierto', 'Cerrado']);
  	        // $table->integer('id_user')->unsigned();
  	        // $table->foreign('id_user')->references('id')->on('users');
  	        // $table->integer('id_user_destino')->unsigned();
  	        // $table->foreign('id_user_destino')->references('id')->on('users');
            // $table->timestamps();
            $table->increments('id');
            $table->integer('id_recibido')->default(0);
            $table->enum('tipo', ['Carta', 'Recibo', 'Factura', 'Otros']);
            $table->date('f_creacion');
            $table->string('codigo');
            $table->string('remitente');
            $table->string('adjunto');
            $table->string('file');
            $table->string('observacion');
            //Valores repetidos para DataTables
            $table->string('referencia');
            $table->enum('estado', ['Abierto', 'Cerrado']);
            $table->enum('accion', ['Archivar', 'Derivar', 'Reg. Correspondencia', 'Rev. Informacion']);
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
        Schema::dropIfExists('recibidos');
    }
}
