@extends('layouts.app')
@section('content')





<h1>Seccion de Alumnos</h1>
<div class="d-flex justify-content-end mb-5"><a href="{{route('alumnos.create')}}" class="btn btn-primary">Crear<ion-icon name="add-circle-outline"></ion-icon></a></div>

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
@foreach ($alumnos as $alumno)
<tr>
<td>{{$alumno->idalumno}}</td>
<td>{{$alumno->nombre}} {{$alumno->apellido}}</td>
<td>{{$alumno->direccion}}</td>
<td>{{$alumno->correo}}</td>
<td class="d-flex justify-content-around">
<a href="{{route('alumnos.show', $alumno->idalumno)}}" class="btn btn-warning btn-sm">Mostrar<ion-icon name="eye-outline"></ion-icon></a>
<a href="{{route('alumnos.edit', $alumno->idalumno)}}"  class="btn btn-success btn-sm">Editar <ion-icon name="create-outline"></ion-icon></a>
<form style="display: inline;" action="{{route('alumnos.destroy',  $alumno->idalumno)}}" method="POST">
{!! method_field('DELETE')!!}
{!! csrf_field()!!}
<button type="submit"  class="btn btn-danger btn-sm">Eliminar<ion-icon name="trash-outline"></ion-icon></button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection









