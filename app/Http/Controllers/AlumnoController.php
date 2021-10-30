<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnos;
use App\User;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumnos::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
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
            'fechanacimiento' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'telefono' => 'required|min:8|max:99999999|numeric',
            'correo' => 'required',

        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'fechadenacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'direccion.required' => 'El campo direccion es obligatorio',
            'genero.required' => 'El campo genero es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio y solo debe ir numeros',
            'correo.required' => 'El campo correo es obligatorio',
        ]);
        $info['clave']= bcrypt('12345678');

        
        

        Alumnos::create($info);

        $new = DB::select('SELECT * 
        FROM alumnos
        ORDER BY idalumno DESC
        LIMIT 1');

        

        
        $user = User::create([
            'name' => $info['nombre']." ".$info['apellido'],
            'email' => $info['correo'],
            'password' => $info['clave'],
            'idalumno' => $new[0]->idalumno,
            
        ]);
        $user->assignRole('alumno');

       
    
        

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Alumnos::FindOrFail($id);
        return view('alumnos.show', compact('alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumnos::FindOrFail($id);

        


        return view('alumnos.edit', compact('alumno'));
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
            'fechanacimiento' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'telefono' => 'required|min:8|max:99999999|numeric',
            'correo' => 'required',

        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'fechadenacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'direccion.required' => 'El campo direccion es obligatorio',
            'genero.required' => 'El campo genero es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio y solo debe ir numeros',
            'correo.required' => 'El campo correo es obligatorio',
        ]);

        DB::update("update users set name = '$info[nombre] $info[apellido]', email = '$info[correo]' where idalumno = ?", [$id]);
        

        
       


        Alumnos::findOrFail($id)->update($info);
        return redirect()->route('alumnos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumnos::findOrFail($id)->delete();
        DB::delete("DELETE FROM users WHERE idalumno = $id");
        return redirect()->route('alumnos.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
