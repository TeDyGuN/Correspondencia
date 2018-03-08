<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     /*
     $table->increments('id');
     $table->string('nombre');
     $table->string('paterno');
     $table->string('materno');
     $table->string('ci');
     $table->string('email')->unique();
     $table->string('telefono');
     $table->string('cargo');
     $table->string('ROLE');
     $table->string('password');
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
            'id_proyecto' => 1,
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
            'id_proyecto' => 1,
            'password' => bcrypt('ariprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Antonio',
            'paterno' => 'Silvestre',
            'username' => 'asilvestre',
            'email' => 'asilvestre@fundacion-profin.org',
            'cargo' => 'Coordinador FIM y Mercados Rurales',
            'img' => 'asilvestre.jpg',
            'ROLE' => 'User',
            'ci' => '3499286',
            'jefe' => 4,
            'v_saldo' => 15,
            'boleta' => 23,
            'id_proyecto' => 2,
            'password' => bcrypt('asiprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Edwin',
            'paterno' => 'Vargas',
            'username' => 'evargas',
            'email' => 'evargas@fundacion-profin.org',
            'cargo' => 'Director Ejecutivo',
            'img' => 'evargas.jpg',
            'ROLE' => 'Admin',
            'ci' => '2966395',
            'jefe' => 11,
            'v_saldo' => 37,
            'boleta' => 41,
            'id_proyecto' => 1,
            'password' => bcrypt('evaprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Erika',
            'paterno' => 'Pacheco',
            'username' => 'epacheco',
            'email' => 'epacheco@fundacion-profin.org',
            'cargo' => 'Coordinadora Tecnica de Seguros y Microseguros',
            'img' => 'epacheco.jpg',
            'ROLE' => 'User',
            'ci' => '2556541',
            'jefe' => 10,
            'v_saldo' => 0.5,
            'boleta' => 7,
            'id_proyecto' => 3,
            'password' => bcrypt('epaprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Ximena',
            'paterno' => 'Jauregui',
            'username' => 'xjauregui',
            'email' => 'xjauregui@fundacion-profin.org',
            'cargo' => 'Coordinadora Técnica de Comunicación y Educación Financiera',
            'img' => 'xjauregui.jpg',
            'ROLE' => 'User',
            'ci' => '2020538',
            'jefe' => 10,
            'v_saldo' => -0.5,
            'boleta' => 7,
            'id_proyecto' => 3,
            'password' => bcrypt('xjaprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Lucia',
            'paterno' => 'Perez',
            'username' => 'lperez',
            'email' => 'lperez@fundacion-profin.org',
            'cargo' => 'Coordinadora Técnica de Articulación',
            'img' => 'lperez.jpg',
            'ROLE' => 'User',
            'ci' => '6960153',
            'jefe' => 10,
            'v_saldo' => -8.5,
            'boleta' => 2,
            'id_proyecto' => 3,
            'password' => bcrypt('lpeprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Niurka',
            'paterno' => 'Viera',
            'username' => 'nviera',
            'email' => 'nviera@fundacion-profin.org',
            'cargo' => 'Coordinadora Técnica de Innovaciones Financieras',
            'img' => 'nviera.jpg',
            'ROLE' => 'User',
            'ci' => '4766431',
            'jefe' => 3,
            'v_saldo' => 2.5,
            'boleta' => 6,
            'id_proyecto' => 2,
            'password' => bcrypt('nviprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Pablo',
            'paterno' => 'Saravia',
            'username' => 'psaravia',
            'email' => 'psaravia@fundacion-profin.org',
            'cargo' => 'Coordinador Técnico de Planificación, Monitoreo y Evaluación',
            'img' => 'psaravia.jpg',
            'ROLE' => 'User',
            'ci' => '4792003',
            'jefe' => 3,
            'v_saldo' => 9,
            'boleta' => 24,
            'id_proyecto' => 2,
            'password' => bcrypt('psaprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Roger',
            'paterno' => 'Alfaro',
            'username' => 'ralfaro',
            'email' => 'ralfaro@fundacion-profin.org',
            'cargo' => 'Coordinador Técnico de Planificación, Monitoreo y Evaluación',
            'img' => 'ralfaro.jpg',
            'ROLE' => 'User',
            'ci' => '2446444',
            'jefe' => 4,
            'v_saldo' => -7,
            'boleta' => 13,
            'id_proyecto' => 3,
            'password' => bcrypt('ralprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Willma',
            'paterno' => 'Arancibia',
            'username' => 'warancibia',
            'email' => 'warancibia@fundacion-profin.org',
            'cargo' => 'Directora Administrativa y Financiera',
            'img' => 'warancibia.jpg',
            'ROLE' => 'Admin',
            'ci' => '2360457',
            'jefe' => 4,
            'v_saldo' => 17.5,
            'boleta' => 48,
            'id_proyecto' => 1,
            'password' => bcrypt('warprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Gustavo',
            'paterno' => 'Medeiros',
            'username' => 'gmedeiros',
            'email' => 'gmedeiros@fundacion-profin.org',
            'cargo' => 'Coordinador Técnico de Estudios e Investigación',
            'img' => 'gmedeiros.jpg',
            'ROLE' => 'User',
            'ci' => '3388195',
            'jefe' => 4,
            'v_saldo' => 0,
            'boleta' => 0,
            'id_proyecto' => 4,
            'password' => bcrypt('gmeprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Monica',
            'paterno' => 'Baldivia',
            'username' => 'mbaldivia',
            'email' => 'mbaldivia@fundacion-profin.org',
            'cargo' => 'Coordinadora Técnica de Seguros',
            'img' => 'mbaldivia.jpg',
            'ROLE' => 'User',
            'ci' => '3353792',
            'jefe' => 3,
            'v_saldo' => 0,
            'boleta' => 0,
            'id_proyecto' => 2,
            'password' => bcrypt('mbaprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Claudia',
            'paterno' => 'Roca',
            'username' => 'croca',
            'email' => 'croca@fundacion-profin.org',
            'cargo' => 'Coordinadora Técnica de Investigacion',
            'img' => 'croca.jpg',
            'ROLE' => 'User',
            'ci' => '2393390',
            'jefe' => 4,
            'v_saldo' => 0,
            'boleta' => 0,
            'id_proyecto' => 4,
            'password' => bcrypt('croprofin')
        ]);


    }
}
