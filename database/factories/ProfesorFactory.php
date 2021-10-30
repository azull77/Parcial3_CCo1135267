<?php

use App\Profesors;
use Faker\Generator as Faker;

$factory->define(Profesors::class, function (Faker $faker) {
    return [
        'nombre' => $this->faker->name(),
            'apellido' => $this->faker->name(),
            'dui' => random_int(1000000, 999999999),
            'telefono' => random_int(1000000, 999999999),
            'email' => $this->faker->safeEmail,
            'clave' => bcrypt('password'), 
    ];
});
