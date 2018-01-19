<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     /*

     'nombre' => 'Ted',
     'paterno' => 'Carrasco',
     'email' => 'tcarrasco@fundacion-profin.org',
     'cargo' => 'Asistente de Sistemas',
     'img' => 'tcarrasco.jpg',
     'ROLE' => 'Admin',
     'password' => bcrypt('tcaprofin'),
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('cargo');
            $table->string('img');
            $table->string('ROLE');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}