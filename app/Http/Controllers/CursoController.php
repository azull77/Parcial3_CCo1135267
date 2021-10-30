<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Profesor;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::all();
        return view('curso.create', compact('profesores'));
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
            'nombrecurso' => 'required', 
            'año' => 'required', 
            'ciclo' => 'required',
            'idprofesor' => 'required',

        ],[
            'nombrecurso.required' => 'El campo nombre es obligatorio',
            'año.required' => 'El campo año es obligatorio',
            'ciclo.required' => 'El campo ciclo es obligatorio',
            'idprofesor.required' => 'El campo profesor es obligatorio',
        ]);

        Curso::create($info);
        return redirect()->route('curso.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::FindOrFail($id);
        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::FindOrFail($id);
        $profesores = Profesor::all();
        return view('curso.edit', compact('curso', 'profesores'));
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
            'nombrecurso' => 'required', 
            'año' => 'required', 
            'ciclo' => 'required',
            'idprofesor' => 'required',

        ],[
            'nombrecurso.required' => 'El campo nombre es obligatorio',
            'año.required' => 'El campo año es obligatorio',
            'ciclo.required' => 'El campo ciclo es obligatorio',
            'idprofesor.required' => 'El campo profesor es obligatorio',
        ]);

        Curso::findOrFail($id)->update($info);

        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::findOrFail($id)->delete();
        return redirect()->route('curso.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
