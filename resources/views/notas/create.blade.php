
@extends('layouts.app')
@section('content')

<h3 class="mt-5 d-flex justify-content-center">Registrar notas</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class="mt-5" action="{{route('notas.store')}}" method="POST">
{!! csrf_field()!!}
  <div class="form-group">
    <div class="col">
      <div class="form-group">
        <label for="nom">Nota 1</label>
        <input id="nom" type="text" class="form-control"  name="nota1" placeholder="Nota 1" required/ value="{{old('nota1')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Nota 2</label>
        <input id="ape" type="text" class="form-control"  name="nota2" placeholder="Nota 2" required/ value="{{old('nota2')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Nota 3</label>
        <input id="ape" type="text" class="form-control"  name="nota3" placeholder="Nota 3" required/ value="{{old('nota3')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Nota 4</label>
        <input id="ape" type="text" class="form-control"  name="nota4" placeholder="Nota 4" required/ value="{{old('nota4')}}">
      </div>
    </div>
    @if ($alumnos == true && $profesores == true)
    <div class="col">
      <div class="form-group">
        <label for="alum">Alumno</label>
        <select id="alum" class="form-control" type="text" name="idalumno" placeholder="Alumno" required/ value="{{old('idalumno')}}">
        @foreach ($alumnos as $alumno)
        <option value="{{ $alumno->idalumno }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
        @endforeach
        </select>

      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label for="pro">Profesor</label>
        <select id="pro" class="form-control" type="text" name="idprofesor" placeholder="Profesor" required/ value="{{old('idprofesor')}}">
        @foreach ($profesores as $profesor)
        <option value="{{ $profesor->idprofesor }}">{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
        @endforeach
        </select>

      </div>
    </div>

    <div class="col">
      <div class="form-group">
        <label for="cur">Curso</label>
        <select id="cur" class="form-control" type="text" name="idcursos" placeholder="Curso" required/ value="{{old('idcursos')}}">
        @foreach ($cursos as $curso)
        <option value="{{ $curso->idcursos }}">{{ $curso->nombrecurso }}</option>
        @endforeach
        </select>

      </div>
    </div>
    @else

    @endif
    <div class="col">
      <div class="form-group">
        <label for="tel">Parcial</label>
        <input id="tel" class="form-control" type="text" name="parcial" placeholder="Parcial" required/ value="{{old('parcial')}}">
      </div>
    </div>



  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-success" href="{{ route('notas.index') }}"> Volver</a>

</form>


@endsection
