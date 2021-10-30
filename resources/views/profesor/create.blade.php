
@extends('layouts.app')
@section('content')

<h3 class="mt-5 d-flex justify-content-center">Registrar profesor</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class="mt-5" action="{{route('profesor.store')}}" method="POST">
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
        <label for="dui">DUI</label>
        <input id="dui" type="text" class="form-control"  name="dui" placeholder="DUI" required/ value="{{old('dui')}}">
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
        <input id="ema" type="email" class="form-control"  name="email" placeholder="email" required/ value="{{old('email')}}">
      </div>
    </div>


  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-success" href="{{ route('profesor.index') }}"><i class="bi bi-arrow-90deg-down"><i class="bi bi-arrow-90deg-down"></i> Volver</a>
</form>


@endsection
