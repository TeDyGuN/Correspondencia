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
      DB::table('proyectos')->insert([
          'nombre' => 'Fundacion Profin',
          'canWrite' => true,
          'zoom' => true,
          'canWriteOnParent' => true,
          'inicio' => '2010-01-01',
          'fin' => '2022-12-31',
          'progreso' => 0,
          'estatus' => 'Activo',
          'presupuesto' => 2000000.00
      ]);
      DB::table('proyectos')->insert([
          'nombre' => 'Mercados Rurales II',
          'canWrite' => true,
          'zoom' => true,
          'canWriteOnParent' => true,
          'inicio' => '2018-01-01',
          'fin' => '2021-12-31',
          'progreso' => 0,
          'estatus' => 'Activo',
          'presupuesto' => 2000000.00
      ]);
      DB::table('proyectos')->insert([
          'nombre' => 'Mercados Inclusivos III',
          'canWrite' => true,
          'zoom' => true,
          'canWriteOnParent' => true,
          'inicio' => '2017-01-01',
          'fin' => '2019-12-31',
          'progreso' => 0,
          'estatus' => 'Activo',
          'presupuesto' => 2000000.00
      ]);
      DB::table('proyectos')->insert([
          'nombre' => 'Unidad de Investigacion',
          'canWrite' => true,
          'zoom' => true,
          'canWriteOnParent' => true,
          'inicio' => '2017-01-01',
          'fin' => '2019-12-31',
          'progreso' => 0,
          'estatus' => 'Activo',
          'presupuesto' => 2000000.00
      ]);
    }
}
