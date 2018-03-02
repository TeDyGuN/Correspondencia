<?php

use Illuminate\Database\Seeder;

class ProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'nombre' => 'Ted',
          'paterno' => 'Carrasco',
          'username' => 'tcarrasco',
          'email' => 'tcarrasco@fundacion-profin.org',
          'cargo' => 'Asistente de Sistemas',
          'ci' => '6837705',
          'img' => 'tcarrasco.jpg',
          'ROLE' => 'Admin',
          'jefe' => 11,
          'v_saldo' => -4,
          'boleta' => 1,
          'password' => bcrypt('tcaprofin')
      ]);
      DB::table('users')->insert([
          'nombre' => 'Andrea',
          'paterno' => 'Rivadeneyra',
          'username' => 'arivadeneyra',
          'email' => 'arivadeneyra@fundacion-profin.org',
          'cargo' => 'Asistente Administrativa ',
          'img' => 'arivadeneyra.jpg',
          'ROLE' => 'Admin',
          'ci' => '6959241',
          'jefe' => 11,
          'v_saldo' => -5,
          'boleta' => 1,
          'password' => bcrypt('ariprofin')
      ]);
    }
}
