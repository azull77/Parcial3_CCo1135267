<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use Illuminate\Support\Facades\DB;
use App\User;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesor.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesor.create');
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
            'nombre' => 'required', 
            'apellido' => 'required', 
            'dui' => 'required',
            'telefono' => 'required|min:8|max:99999999|numeric',
            'email' => 'required',

        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'dui.required' => 'El campo dui es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio y solo debe ir numeros',
            'email.required' => 'El campo correo es obligatorio',
        ]);
        $info['clave']= bcrypt('12345678');

        Profesor::create($info);

        $new = DB::select('SELECT * 
        FROM profesor
        ORDER BY idprofesor DESC
        LIMIT 1');

        

        
        $user = User::create([
            'name' => $info['nombre']." ".$info['apellido'],
            'email' => $info['email'],
            'password' => $info['clave'],
            'idprofesor' => $new[0]->idprofesor,
            
        ]);
        $user->assignRole('profesor');

       

        return redirect()->route('profesor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = Profesor::findorfail($id);
        return view('profesor.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor = Profesor::findorfail($id);
        return view('profesor.edit', compact('profesor'));
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
            'nombre' => 'required', 
            'apellido' => 'required', 
            'dui' => 'required',
            'telefono' => 'required|min:8|max:99999999|numeric',
            'email' => 'required',

        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'dui.required' => 'El campo dui es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio y solo debe ir numeros',
            'correo.required' => 'El campo correo es obligatorio',
        ]);

        DB::update("update users set name = '$info[nombre] $info[apellido]', email = '$info[email]' where idprofesor = ?", [$id]);

        Profesor::findOrFail($id)->update($info);
        return redirect()->route('profesor.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesor::findOrFail($id)->delete();
        DB::delete("DELETE FROM users WHERE idprofesor = $id");
        return redirect()->route('profesor.index');

    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
