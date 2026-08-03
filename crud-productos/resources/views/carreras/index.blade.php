@extends('layouts.app')
@section('title', 'Carreras')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Carreras</h1>
    <a href="{{ route('carreras.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Carrera</a>
</div>
<table class="table table-striped">
    <thead class="table-dark"><tr><th>ID</th><th>Nombre</th><th>Estatus</th><th>Acciones</th></tr></thead>
    <tbody>
        @forelse($carreras as $carrera)
        <tr>
            <td>{{ $carrera->IdCarrera }}</td>
            <td>{{ $carrera->NombreCarreras }}</td>
            <td>{!! $carrera->Estatus ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>' !!}</td>
            <td>
                <a href="{{ route('carreras.show', $carrera) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty <tr><td colspan="4" class="text-center">No hay carreras registradas</td></tr>
        @endforelse
    </tbody>
</table>
{{ $carreras->links() }}
@endsection