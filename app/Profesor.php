<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    
    protected $table = 'profesor';
    protected $primaryKey = 'idprofesor';
    protected $fillable = ['nombre', 'apellido', 'dui', 'telefono', 'email', 'clave'];
}
