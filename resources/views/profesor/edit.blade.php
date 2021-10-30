
@extends('layouts.app')
@section('content')

<h3 class="mt-5 d-flex justify-content-center">Editar profesor</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form class="mt-5" action="{{route('profesor.update', $profesor->idprofesor)}}" method="POST">
{!! method_field('PUT')!!}
{!! csrf_field()!!}
  <div class="form-group">
    <div class="col">
      <div class="form-group">
        <label for="nom">Nombre</label>
        <input id="nom" type="text" class="form-control"  name="nombre" placeholder="Nombres" required/ value="{{$profesor->nombre}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Apellidos</label>
        <input id="ape" type="text" class="form-control"  name="apellido" placeholder="apellidos" required/ value="{{$profesor->apellido}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="dir">DUI</label>
        <input id="dir" type="text" class="form-control"  name="dui" placeholder="Direccion" required/ value="{{$profesor->dui}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="tel">Telefono</label>
        <input id="tel" class="form-control" type="text" name="telefono" placeholder="Telefono" required/ value="{{$profesor->telefono}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ema">Correo</label>
        <input id="ema" type="email" class="form-control"  name="email" placeholder="email" required/ value="{{$profesor->email}}">
      </div>
    </div>


  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a href="{{ route('profesor.index') }}" class="btn btn-success mt-5 mb-3">Regresar</a>

</form>




@endsection
