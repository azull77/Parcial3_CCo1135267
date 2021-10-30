@extends('layouts.app')
@section('content')
<h1 class="mt-3 mb-3">Mas datos del curso: {{$curso->nombrecurso}}</h1>


<table width="100%" id="myTable" class="display">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Año</th>
<th>Ciclo</th>
<th>Profesor</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>

<tr>
<td>{{$curso->idcursos}}</td>
<td>{{$curso->nombrecurso}}</td>
<td>{{$curso->año}}</td>
<td>{{$curso->ciclo}}</td>
<td>{{$curso->profesor->nombre}}</td>
<td class="d-flex justify-content-around">
<a href="{{route('curso.edit', $curso->idcursos)}}"  class="btn btn-success"> <ion-icon name="create-outline"></ion-icon></a>
<form style="display: inline;" action="{{route('curso.destroy',  $curso->idcursos)}}" method="POST">
{!! method_field('DELETE')!!}
{!! csrf_field()!!}
<button type="submit"  class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button></form>
</td>
</tr>

</tbody>
</table>

<a href="{{ route('curso.index') }}" class="btn btn-primary mt-5">Regresar</a>
@endsection