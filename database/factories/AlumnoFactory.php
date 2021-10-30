<?php


use App\Alumnos;
use Faker\Generator as Faker;

$factory->define(Alumnos::class, function (Faker $faker) {
    $gender = $faker->randomElement(['M', 'F']);
    return [
        'nombre' => $this->faker->name(),
        'apellido' => $this->faker->name(),
        'fechanacimiento' => '2021-09-18',
        'direccion' => 'San Salvador',
        'genero' => $gender,
        'telefono' => random_int(1000000, 999999999),
        'correo' => $this->faker->safeEmail,
        'clave' =>  bcrypt('password'),
    ];
});
