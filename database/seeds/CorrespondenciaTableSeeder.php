<?php

use Illuminate\Database\Seeder;
use app\Recibidos;
class CorrespondenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $users = factory(App\Recibidos::class, 3)->create();
     }
}
