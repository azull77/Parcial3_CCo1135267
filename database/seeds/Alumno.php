<?php

use Illuminate\Database\Seeder;

use App\Alumnos;
use App\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Spatie\Permission\Models\Role;



class Alumno extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'profesor']);
        Role::create(['name' => 'alumno']);
        $faker = Factory::create();
        $gender = $faker->randomElement(['M', 'F']);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('alumnos')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /* DB::table('alumnos')->insert([
            'nombre' => $faker->name,
            'apellido' => $faker->name,
            'fechanacimiento' => '2021-09-18',
            'direccion' => 'San Salvador',
            'genero' => $gender,
            'telefono' => random_int(1000000, 999999999),
            'correo' => $faker->name.'@gmail.com',
            'clave' =>  bcrypt('password'),
        ]); */

        $datos = [
            'nombre' => 'Henrry',
        'apellido' => 'Caceres',
        'fechanacimiento' => '2021-09-18',
        'direccion' => 'San Salvador',
        'genero' => 'M',
        'telefono' => random_int(1000000, 999999999),
        'correo' => 'henrry@gmail.com',
        'clave' =>  bcrypt('12345678'),
        ];

        $user = User::create([
            'name' => 'Henrry Caceres',
            'email' => 'henrry@gmail.com',
            'password' => bcrypt('12345678'),
            'idalumno' => '1'
        ]);
        $user->assignRole('alumno');

        Alumnos::create($datos);


        //factory(Alumnos::class, 18)->create();



    }
}
