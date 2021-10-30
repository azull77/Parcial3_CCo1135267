<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('cursos')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('cursos')->insert([
            'nombrecurso' => 'Programacion III',
            'año' => '2021',
            'ciclo' => 'II',
            'idprofesor' => '1',

        ]);
    }
}
