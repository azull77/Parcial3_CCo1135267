
@extends('layouts.app')
@section('content')

<h3 class="mt-5 d-flex justify-content-center">Editar curso</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form class="mt-5" action="{{route('curso.update', $curso->idcursos)}}" method="POST">
{!! method_field('PUT')!!}
{!! csrf_field()!!}
  <div class="form-group">
  <div class="col">
      <div class="form-group">
        <label for="nom">Nombre</label>
        <input id="nom" type="text" class="form-control"  name="nombrecurso" placeholder="Nombre" required/ value="{{$curso->nombrecurso}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Año</label>
        <input id="ape" type="text" class="form-control"  name="año" placeholder="año" required/ value="{{$curso->año}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="dui">Ciclo</label>
        <input id="dui" type="text" class="form-control"  name="ciclo" placeholder="ciclo" required/ value="{{$curso->ciclo}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="pro">Profesor</label>
        <select id="pro" class="form-control" type="text" name="idprofesor" placeholder="Profesor" required/ value="{{old('idprofesor')}}">
        @foreach ($profesores as $profesor)
        <option value="{{ $profesor->idprofesor }}"

        @if ($profesor->idprofesor == $curso->idprofesor)
        selected="selected"
        @endif
        >{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
        @endforeach
        </select>

      </div>
    </div>


  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{ route('curso.index') }}" class="btn btn-success mt-5 mb-3">Regresar</a>

</form>




@endsection
