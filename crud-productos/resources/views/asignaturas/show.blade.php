@extends('layouts.app')
@section('title', 'Detalles de Asignatura')
@section('content')
<div class="card">
    <div class="card-header"><h2>{{ $asignatura->Nombre }}</h2></div>
    <div class="card-body">
        <table class="table">
            <tr><th>ID:</th><td>{{ $asignatura->idAsignatura }}</td></tr>
            <tr><th>Nombre:</th><td>{{ $asignatura->Nombre }}</td></tr>
            <tr><th>Horas Totales:</th><td>{{ $asignatura->HorasTotales }} horas</td></tr>
            <tr><th>Creado:</th><td>{{ $asignatura->created_at }}</td></tr>
            <tr><th>Actualizado:</th><td>{{ $asignatura->updated_at }}</td></tr>
        </table>
        <h4 class="mt-4">Alumnos inscritos en esta asignatura</h4>
        <table class="table table-sm">
            <thead class="table-secondary"><tr><th>Matrícula</th><th>Alumno</th><th>Calificación</th></tr></thead>
            <tbody>
                @forelse($asignatura->alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->Matricula }}</td>
                    <td>{{ $alumno->datosPersonales->Nombre ?? 'N/A' }} {{ $alumno->datosPersonales->ApellidoPaterno ?? '' }}</td>
                    <td>{{ $alumno->pivot->Calificacion ?? 'Pendiente' }}</td>
                </tr>
                @empty <tr><td colspan="3" class="text-center">No hay alumnos inscritos</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('asignaturas.edit', $asignatura) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection