<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('idnota');
            $table->string('nota1');
            $table->string('nota2');
            $table->string('nota3');
            $table->string('nota4');
            $table->string('promedio');
            $table->string('parcial');
            $table->unsignedInteger('idalumno');
            $table->foreign('idalumno')->references('idalumno')->on('alumnos');
            $table->unsignedInteger('idcursos');
            $table->foreign('idcursos')->references('idcursos')->on('cursos');
            $table->unsignedInteger('idprofesor');
            $table->foreign('idprofesor')->references('idprofesor')->on('profesor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
