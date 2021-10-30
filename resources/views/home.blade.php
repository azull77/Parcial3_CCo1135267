@extends('layouts.app')

@section('content')
                @if(@Auth::user()->hasRole('admin'))
                <h2 class="text-center">Bienvenido Administrador</h2>
                @endif
                @if(@Auth::user()->hasRole('profesor'))
                <h2 class="text-center">Bienvenido Profesor</h2>

                @endif

                @if(@Auth::user()->hasRole('alumno'))
                <h2 class="text-center">Bienvenido Alumno</h2>
                @endif

@endsection
