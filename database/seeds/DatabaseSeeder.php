<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Alumno::class);
        $this->call(ProfesorSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(NotasSeeder::class);
    }
}
