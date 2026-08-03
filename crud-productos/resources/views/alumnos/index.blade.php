@extends('layouts.app')
@section('title', 'Alumnos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Alumno</a>
</div>
<table class="table table-striped">
    <thead class="table-dark"><tr><th>Matrícula</th><th>Nombre</th><th>Carrera</th><th>Status</th><th>Acciones</th></tr></thead>
    <tbody>
        @forelse($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->Matricula }}</td>
            <td>{{ $alumno->datosPersonales->Nombre ?? 'N/A' }} {{ $alumno->datosPersonales->ApellidoPaterno ?? '' }}</td>
            <td>{{ $alumno->carrera->NombreCarreras ?? 'N/A' }}</td>
            <td>@if($alumno->Status == 'A') Activo @elseif($alumno->Status == 'B') Baja @else Graduado @endif</td>
            <td>
                <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty <tr><td colspan="5" class="text-center">No hay alumnos</td></tr>
        @endforelse
    </tbody>
</table>
{{ $alumnos->links() }}
@endsection