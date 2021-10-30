@extends('layouts.app')

@section('content')

<h1>Seccion de Notas</h1>
    @if(@Auth::user()->hasRole('admin'))
<div class="d-flex justify-content-end mb-5"><a href="{{route('notas.create')}}" class="btn btn-primary">Crear<ion-icon name="add-circle-outline"></ion-icon></a></div>
@endif





</div>
</div>
<table width="100%" id="myTable" class="display">
<thead>
<tr>
<th>ID</th>
<th>Alumno</th>
<th>Curso</th>
<th>Nota 1</th>
<th>Nota 2</th>
<th>Nota 3</th>
<th>Nota 4</th>
<th>Promedio</th>
<th>Parcial</th>
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($notas as $nota)
<tr>
<td>{{$nota->idnota}}</td>
<td>{{$nota->alumno->nombre}} {{$nota->alumno->apellido}}</td>
<td>{{$nota->curso->nombrecurso}}</td>
<td>{{$nota->nota1}}</td>
<td>{{$nota->nota2}}</td>
<td>{{$nota->nota3}}</td>
<td>{{$nota->nota4}}</td>
<td>{{$nota->promedio}}</td>
<td>{{$nota->parcial}}</td>
<td>
@php
$suma = $nota->nota1 + $nota->nota2 + $nota->nota3 + $nota->nota4;
$total = $suma / 4;
@endphp

@if($suma >= 7)
{{"APROBADO"}}
@else
{{"REPROBADO"}}
@endif
</td>
<td class="d-flex justify-content-around">
<a href="{{route('notas.show', $nota->idnota)}}" class="btn btn-warning btn-sm">Mostrar<ion-icon name="eye-outline"></ion-icon></a>
<a href="{{route('notas.edit', $nota->idnota)}}"  class="btn btn-success btn-sm"> Editar<ion-icon name="create-outline"></ion-icon></a>
<form style="display: inline;" action="{{route('notas.destroy',  $nota->idnota)}}" method="POST">
{!! method_field('DELETE')!!}
{!! csrf_field()!!}
<button type="submit"  class="btn btn-danger btn-sm">Eliminar<ion-icon name="trash-outline"></ion-icon></button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection



