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
            'img' => 'tcarrasco.jpg',
            'ROLE' => 'Admin',
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
            'password' => bcrypt('ralprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Wilma',
            'paterno' => 'Arancibia',
            'username' => 'warancibia',
            'email' => 'warancibia@fundacion-profin.org',
            'cargo' => 'Directora Administrativa y Financiera',
            'img' => 'warancibia.jpg',
            'ROLE' => 'Admin',
            'password' => bcrypt('warprofin')
        ]);
        DB::table('users')->insert([
            'nombre' => 'Gustavo',
            'paterno' => 'Medeiros',
            'username' => 'gmedeiros',
            'email' => 'gmedeiros@fundacion-profin.org',
            'cargo' => 'Coordinador Técnico en Negocios e Inversiones',
            'img' => 'gmedeiros.jpg',
            'ROLE' => 'User',
            'password' => bcrypt('gmeprofin')
        ]);


    }
}
