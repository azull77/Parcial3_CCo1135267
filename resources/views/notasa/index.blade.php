@extends('layouts.app')
@section('content')
<h1>Seccion de Notas</h1>


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
<th>Estado</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($notas as $nota)
@if($nota->idalumno == @Auth::user()->idalumno)
<tr>
<td>{{$nota->idnota}}</td>
<td>{{$nota->alumno->nombre}} {{$nota->alumno->apellido}}</td>
<td>{{$nota->curso->nombrecurso}}</td>
<td>{{$nota->nota1}}</td>
<td>{{$nota->nota2}}</td>
<td>{{$nota->nota3}}</td>
<td>{{$nota->nota4}}</td>
<td>{{$nota->promedio}}</td>
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
<a href="{{route('notasa.show', $nota->idnota)}}" class="btn btn-warning"><ion-icon name="eye-outline"></ion-icon></a>

</form>
</td>
</tr>
@endif
@endforeach
</tbody>
</table>
@endsection
