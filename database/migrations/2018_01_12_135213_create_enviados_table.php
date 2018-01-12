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
            $table->date('f_creacion');
            $table->string('codigo');
            $table->string('receptor');
            $table->string('referencia');
            $table->string('adjunto');
            $table->string('file');
            $table->string('observacion');
  	        $table->integer('id_user')->unsigned();
  	        $table->foreign('id_user')->references('id')->on('users');
  	        $table->integer('id_user_remite')->unsigned();
  	        $table->foreign('id_user_remite')->references('id')->on('users');
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
