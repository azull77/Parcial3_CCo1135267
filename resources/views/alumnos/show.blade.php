@extends('layouts.app')
@section('content')
<h1 class="mt-3 mb-3">Mas datos del alumno: {{$alumnos->nombre}} {{$alumnos->apellido}} </h1>


<table width="100%" id="myTable" class="display">
<thead>
<tr>
<th>ID</th>
<th>Nombres</th>
<th>Direccion</th>
<th>Correo</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>

<tr>
<td>{{$alumnos->idalumno}}</td>
<td>{{$alumnos->nombre}} {{$alumnos->apellido}}</td>
<td>{{$alumnos->direccion}}</td>
<td>{{$alumnos->correo}}</td>
<td class="d-flex justify-content-around">
<a href="{{route('alumnos.edit', $alumnos->idalumno)}}"  class="btn btn-success"> <ion-icon name="create-outline"></ion-icon></a>
<form style="display: inline;" action="{{route('alumnos.destroy',  $alumnos->idalumno)}}" method="POST">
{!! method_field('DELETE')!!}
{!! csrf_field()!!}
<button type="submit"  class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button></form>
</td>
</tr>

</tbody>
</table>

<a href="{{ route('alumnos.index') }}" class="btn btn-primary mt-5">Regresar</a>
@endsection