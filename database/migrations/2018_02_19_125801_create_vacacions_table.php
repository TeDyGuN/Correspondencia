<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->date('inicio');
            $table->date('fin');
            $table->decimal('duracion', 3, 1);
            $table->integer('boleta');
            $table->date('ultimo_trabajo');
            $table->date('reanudacion_trabajo');
            $table->text('observacion');
            $table->enum('tipo', ['Asignacion', 'Vacacion', 'Atraso']);
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
        Schema::dropIfExists('vacacions');
    }
}
