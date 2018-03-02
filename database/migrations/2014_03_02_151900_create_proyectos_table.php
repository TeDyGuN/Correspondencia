<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('canWrite');
            $table->boolean('zoom');
            $table->boolean('canWriteOnParent');
            $table->date('inicio');
            $table->date('fin');
            $table->integer('progreso');
            $table->enum('estatus', ['Activo', 'Inactivo']);
            $table->double('presupuesto', 12, 2);
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
        Schema::dropIfExists('proyectos');
    }
}
