@extends('layouts.app')
@section('title', 'Detalles del Alumno')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>{{ $alumno->datosPersonales->Nombre ?? 'Sin nombre' }} {{ $alumno->datosPersonales->ApellidoPaterno ?? '' }}</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr><th>Matrícula:</th><td>{{ $alumno->Matricula }}</td></tr>
                    <tr><th>Carrera:</th><td>{{ $alumno->carrera->NombreCarreras ?? 'N/A' }}</td></tr>
                    <tr><th>Status:</th>
                        <td>
                            @if($alumno->Status == 'A')
                                <span class="badge bg-success">Activo</span>
                            @elseif($alumno->Status == 'B')
                                <span class="badge bg-danger">Baja</span>
                            @else
                                <span class="badge bg-info">Graduado</span>
                            @endif
                        </td>
                    </tr>
                    <tr><th>Nombre:</th><td>{{ $alumno->datosPersonales->Nombre ?? 'N/A' }}</td></tr>
                    <tr><th>Apellido Paterno:</th><td>{{ $alumno->datosPersonales->ApellidoPaterno ?? 'N/A' }}</td></tr>
                    <tr><th>Apellido Materno:</th><td>{{ $alumno->datosPersonales->ApellidoMaterno ?? 'N/A' }}</td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th>Fecha Nacimiento:</th><td>{{ $alumno->datosPersonales->FechaNacimiento ?? 'N/A' }}</td></tr>
                    <tr><th>Género:</th><td>{{ $alumno->datosPersonales->genero->Genero ?? 'N/A' }}</td></tr>
                    <tr><th>Teléfono:</th><td>{{ $alumno->datosPersonales->Telefono ?? 'N/A' }}</td></tr>
                    <tr><th>Email:</th><td>{{ $alumno->datosPersonales->Email ?? 'N/A' }}</td></tr>
                    <tr><th>Dirección:</th><td>{{ $alumno->datosPersonales->Calle ?? '' }} #{{ $alumno->datosPersonales->NumE ?? '' }}, CP {{ $alumno->datosPersonales->CP ?? '' }}</td></tr>
                </table>
            </div>
        </div>
        <h4 class="mt-4">Asignaturas Inscritas</h4>
        <table class="table table-sm">
            <thead class="table-secondary">
                <tr><th>Asignatura</th><th>Horas Totales</th><th>Calificación</th><th>Fecha Inscripción</th></tr>
            </thead>
            <tbody>
                @forelse($alumno->asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->Nombre }}</td>
                    <td>{{ $asignatura->HorasTotales }}</td>
                    <td>{{ $asignatura->pivot->Calificacion ?? 'Pendiente' }}</td>
                    <td>{{ $asignatura->pivot->FechaInscripcion }}</td>
                </tr>
                @empty
                    <tr><td colspan="4" class="text-center">No inscrito en asignaturas</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection