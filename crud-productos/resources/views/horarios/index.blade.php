@extends('layouts.app')
@section('title', 'Horarios')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Horarios</h1>
    <a href="{{ route('horarios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Horario</a>
</div>
<table class="table table-striped">
    <thead class="table-dark"><tr><th>ID</th><th>Día</th><th>Horario Inicio</th><th>Horario Fin</th><th>Aula</th><th>Acciones</th></tr></thead>
    <tbody>
        @forelse($horarios as $horario)
        <tr>
            <td>{{ $horario->idHorario }}</td>
            <td>{{ $horario->Dia }}</td>
            <td>{{ $horario->HorarioInicio }}</td>
            <td>{{ $horario->HorarioFin }}</td>
            <td>{{ $horario->Aula }}</td>
            <td>
                <a href="{{ route('horarios.show', $horario) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <form action="{{ route('horarios.destroy', $horario) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty <tr><td colspan="6" class="text-center">No hay horarios registrados</td></tr>
        @endforelse
    </tbody>
</table>
{{ $horarios->links() }}
@endsection