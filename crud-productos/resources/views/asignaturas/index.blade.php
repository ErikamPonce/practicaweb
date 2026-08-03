@extends('layouts.app')
@section('title', 'Asignaturas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Asignaturas</h1>
    <a href="{{ route('asignaturas.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Asignatura</a>
</div>
<table class="table table-striped">
    <thead class="table-dark"><tr><th>ID</th><th>Nombre</th><th>Horas Totales</th><th>Acciones</th></tr></thead>
    <tbody>
        @forelse($asignaturas as $asignatura)
        <tr>
            <td>{{ $asignatura->idAsignatura }}</td>
            <td>{{ $asignatura->Nombre }}</td>
            <td>{{ $asignatura->HorasTotales }} horas</td>
            <td>
                <a href="{{ route('asignaturas.show', $asignatura) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a href="{{ route('asignaturas.edit', $asignatura) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('asignaturas.destroy', $asignatura) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty <tr><td colspan="4" class="text-center">No hay asignaturas registradas</td></tr>
        @endforelse
    </tbody>
</table>
{{ $asignaturas->links() }}
@endsection