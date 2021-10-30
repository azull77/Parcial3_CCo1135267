@extends('layouts.app')
@section('content')
<h1>notasa de {{$nota->alumno->nombre}} {{$nota->alumno->apellido}}</h1>


<table width="100%" id="myTable" class="display">
<thead>
<tr>
<th>ID</th>
<th>Alumno</th>
<th>Curso</th>
<th>Profesor</th>
<th>Nota 1</th>
<th>Nota 2</th>
<th>Nota 3</th>
<th>Nota 4</th>
<th>Promedio</th>
<th>Parcial</th>
<th>Estado</th>

</tr>
</thead>
<tbody>

<tr>
<td>{{$nota->idnota}}</td>
<td>{{$nota->alumno->nombre}} {{$nota->alumno->apellido}}</td>
<td>{{$nota->curso->nombrecurso}}</td>
<td>{{$nota->profesor->nombre}} {{$nota->profesor->apellido}}</td>
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
@endif</td>
</form>
</td>
</tr>

</tbody>
</table>


<a href="{{ route('notasa.index') }}" class="btn btn-primary mt-5">Regresar</a>
@endsection


