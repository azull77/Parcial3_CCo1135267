
@extends('layouts.app')
@section('content')

<h3 class="mt-5 d-flex justify-content-center">Registrar Alumno</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class="mt-5" action="{{route('alumnos.store')}}" method="POST">
{!! csrf_field()!!}
  <div class="form-group">
    <div class="col">
      <div class="form-group">
        <label for="nom">Nombre</label>
        <input id="nom" type="text" class="form-control"  name="nombre" placeholder="Nombres" required/ value="{{old('nombre')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Apellidos</label>
        <input id="ape" type="text" class="form-control"  name="apellido" placeholder="apellidos" required/ value="{{old('apellido')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="fecha">Fecha de nacimiento</label>
        <input id="fecha" type="date" class="form-control"  name="fechanacimiento" placeholder="Nombres" required/ value="{{old('fechanacimiento')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="dir">Direccion</label>
        <input id="dir" type="text" class="form-control"  name="direccion" placeholder="Direccion" required/ value="{{old('direccion')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="gen">Genero</label>
        <select id="gen" class="form-control" type="text" name="genero" placeholder="Genero" required/ value="{{old('genero')}}">
        <option value="Masculino">Masculino</option>
        <option value="Femenimo">Femenimo</option>
        </select>

      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="tel">Telefono</label>
        <input id="tel" class="form-control" type="text" name="telefono" placeholder="Telefono" required/ value="{{old('telefono')}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ema">Correo</label>
        <input id="ema" type="email" class="form-control"  name="correo" placeholder="email" required/ value="{{old('correo')}}">
      </div>
    </div>


  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-success" href="{{ route('alumnos.index') }}"><i class="bi bi-arrow-90deg-left"></i> Volver</a>
</form>


@endsection
