@extends('layouts.app')
@section('content')
<h1 class="mt-3 mb-3">Mas datos del profesor: {{$profesor->nombre}} {{$profesor->apellido}} </h1>


<table width="100%" id="myTable" class="display">
<thead>
<tr>
<th>ID</th>
<th>Nombres</th>
<th>DUI</th>
<th>Telefono</th>
<th>Correo</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>

<tr>
<td>{{$profesor->idprofesor}}</td>
<td>{{$profesor->nombre}} {{$profesor->apellido}}</td>
<td>{{$profesor->dui}}</td>
<td>{{$profesor->telefono}}</td>
<td>{{$profesor->email}}</td>
<td class="d-flex justify-content-around">
<a href="{{route('profesor.edit', $profesor->idprofesor)}}"  class="btn btn-success"> <ion-icon name="create-outline"></ion-icon></a>
<form style="display: inline;" action="{{route('profesor.destroy',  $profesor->idprofesor)}}" method="POST">
{!! method_field('DELETE')!!}
{!! csrf_field()!!}
<button type="submit"  class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button></form>
</td>
</tr>

</tbody>
</table>

<a href="{{ route('profesor.index') }}" class="btn btn-primary mt-5">Regresar</a>
@endsection