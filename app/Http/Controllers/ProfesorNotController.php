<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;
use App\Profesor;
use App\Curso;
use App\Alumnos;

class ProfesorNotController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $notasp = Nota::all();
       return view('notasp.index', compact('notasp'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $alumnos = Alumnos::all();
       $profesores = Profesor::all();
       $cursos = Curso::all();
       return view('notasp.create',  compact('alumnos', 'profesores', 'cursos'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $info = $request->validate([
           'nota1' => 'required|min:1|max:10|numeric', 
           'nota2' => 'required|min:1|max:10|numeric', 
           'nota3' => 'required|min:1|max:10|numeric',
           'nota4' => 'required|min:1|max:10|numeric',
           'idalumno' => 'required',
           'idprofesor' => 'required',
           'idcursos' => 'required',
           'parcial' => 'required|min:1|max:10|numeric',

       ],[
           'nota1.required' => 'El campo nota 1 es obligatorio',
           'nota2.required' => 'El campo nota 2 es obligatorio',
           'nota3.required' => 'El campo nota 3  de nacimiento es obligatorio',
           'nota4.required' => 'El campo nota 4 es obligatorio',
           'idalumno.required' => 'El campo alumno es obligatorio',
           'idprofesor.required' => 'El campo profesor es obligatorio',
           'idcursos.required' => 'El campo curso es obligatorio',
           'parcial.required' => 'El campo parcial es obligatorio',
       ]);
       $suma =  $info['nota1'] + $info['nota2'] + $info['nota3'] + $info['nota4'] + $info['parcial'] ;
       $promedio = $suma / 5;
       $info['promedio'] = $promedio;

       Nota::create($info);
       return redirect()->route('notasp.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $nota = Nota::FindOrFail($id);
       return view('notasp.show', compact('nota'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $alumnos = Alumnos::all();
       $profesores = Profesor::all();
       $cursos = Curso::all();
       $nota = Nota::findorfail($id);
       return view('notasp.edit',  compact('alumnos', 'profesores', 'cursos', 'nota'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $info = $request->validate([
           'nota1' => 'required|min:1|max:10|numeric', 
           'nota2' => 'required|min:1|max:10|numeric', 
           'nota3' => 'required|min:1|max:10|numeric',
           'nota4' => 'required|min:1|max:10|numeric',
           'idalumno' => 'required',
           'idprofesor' => 'required',
           'idcursos' => 'required',
           'parcial' => 'required|min:1|max:10|numeric',

       ],[
           'nota1.required' => 'El campo nota 1 es obligatorio',
           'nota2.required' => 'El campo nota 2 es obligatorio',
           'nota3.required' => 'El campo nota 3  de nacimiento es obligatorio',
           'nota4.required' => 'El campo nota 4 es obligatorio',
           'idalumno.required' => 'El campo alumno es obligatorio',
           'idprofesor.required' => 'El campo profesor es obligatorio',
           'idcursos.required' => 'El campo curso es obligatorio',
           'parcial.required' => 'El campo parcial es obligatorio',
       ]);
       $suma =  $info['nota1'] + $info['nota2'] + $info['nota3'] + $info['nota4'] + $info['parcial'] ;
       $promedio = $suma / 5;
       $info['promedio'] = $promedio;

       Nota::findOrFail($id)->update($info);
       return redirect()->route('notasp.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Nota::findOrFail($id)->delete();
       return redirect()->route('notasp.index');
   }

   public function __construct()
    {
        $this->middleware('auth');
    }
}
