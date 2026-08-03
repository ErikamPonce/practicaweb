@extends('layouts.app')
@section('title', 'Personal')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Personal</h1>
    <a href="{{ route('personal.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Personal</a>
</div>
<table class="table table-striped">
    <thead class="table-dark">
        <tr><th>Clave</th><th>Nombre</th><th>Tipo</th><th>Status</th><th>Acciones</th></tr>
    </thead>
    <tbody>
        @forelse($personal as $item)
        <tr>
            <td>{{ $item->ClaveEmp }}</td>
            <td>{{ $item->datosPersonales->Nombre ?? 'N/A' }} {{ $item->datosPersonales->ApellidoPaterno ?? '' }}</td>
            <td>{{ $item->tipo->Nombre ?? 'N/A' }}</td>
            <td>{!! $item->Status ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>' !!}</td>
            <td>
                <a href="{{ route('personal.show', $item) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a href="{{ route('personal.edit', $item) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('personal.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty <tr><td colspan="5" class="text-center">No hay personal registrado</td></tr>
        @endforelse
    </tbody>
</table>
{{ $personal->links() }}
@endsection