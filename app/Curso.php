<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'idcursos';
    protected $fillable = ['nombrecurso', 'año', 'ciclo', 'idprofesor'];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idprofesor');
    }
}
