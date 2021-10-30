<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

use App\Profesor;

class ProfesorSeeder extends Seeder
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
		DB::table('profesor')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('profesor')->insert([
            'nombre' => 'Jorge',
            'apellido' => 'Coto',
            'dui' => random_int(1000000, 999999999),
            'telefono' => random_int(1000000, 999999999),
            'email' => 'jorge@gmail.com',
            'clave' => bcrypt('12345678'),
        ]);


        $user = User::create([
            'name' => 'Jorge Coto',
            'email' => 'jorge@gmail.com',
            'password' => bcrypt('12345678'),
            'idprofesor' => '1'
        ]);
        $user->assignRole('profesor');



        //factory(Profesors::class, 18)->create();


    }
}

