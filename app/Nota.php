<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'idnota';
    protected $fillable = [ 
    'nota1' , 
    'nota2', 
    'nota3',
    'nota4' ,
    'idalumno',
    'idprofesor' ,
    'idcursos',
    'parcial',
    'promedio'];




    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idprofesor');
    }

    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'idalumno');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'idcursos');
    }
}
