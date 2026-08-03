@extends('layouts.app')
@section('title', 'Escuelas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Escuelas</h1>
    <a href="{{ route('escuelas.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Escuela</a>
</div>
<table class="table table-striped">
    <thead class="table-dark"><tr><th>CCT</th><th>Nombre</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr></thead>
    <tbody>
        @forelse($escuelas as $escuela)
        <tr>
            <td>{{ $escuela->CCT }}</td><td>{{ $escuela->Nombre }}</td><td>{{ $escuela->Telefono }}</td><td>{{ $escuela->Email }}</td>
            <td>
                <a href="{{ route('escuelas.show', $escuela) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a href="{{ route('escuelas.edit', $escuela) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('escuelas.destroy', $escuela) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty <tr><td colspan="5" class="text-center">No hay escuelas</td></tr>
        @endforelse
    </tbody>
</table>
{{ $escuelas->links() }}
@endsection