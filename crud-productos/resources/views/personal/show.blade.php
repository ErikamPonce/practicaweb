@extends('layouts.app')
@section('title', 'Detalles del Personal')
@section('content')
<div class="card">
    <div class="card-header"><h2>{{ $personal->datosPersonales->Nombre ?? 'N/A' }} {{ $personal->datosPersonales->ApellidoPaterno ?? '' }}</h2></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr><th>Clave:</th><td>{{ $personal->ClaveEmp }}</td></tr>
                    <tr><th>Tipo:</th><td>{{ $personal->tipo->Nombre ?? 'N/A' }}</td></tr>
                    <tr><th>Status:</th><td>{!! $personal->Status ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>' !!}</td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr><th>Nombre:</th><td>{{ $personal->datosPersonales->Nombre ?? 'N/A' }}</td></tr>
                    <tr><th>Apellidos:</th><td>{{ $personal->datosPersonales->ApellidoPaterno ?? '' }} {{ $personal->datosPersonales->ApellidoMaterno ?? '' }}</td></tr>
                    <tr><th>Teléfono:</th><td>{{ $personal->datosPersonales->Telefono ?? 'N/A' }}</td></tr>
                    <tr><th>Email:</th><td>{{ $personal->datosPersonales->Email ?? 'N/A' }}</td></tr>
                </table>
            </div>
        </div>
        <h4 class="mt-4">Horarios Asignados</h4>
        <table class="table table-sm">
            <thead class="table-secondary"><tr><th>Día</th><th>Horario Inicio</th><th>Horario Fin</th><th>Aula</th></tr></thead>
            <tbody>
                @forelse($personal->horarios as $horario)
                <tr><td>{{ $horario->Dia }}</td><td>{{ $horario->HorarioInicio }}</td><td>{{ $horario->HorarioFin }}</td><td>{{ $horario->Aula }}</td></tr>
                @empty <tr><td colspan="4" class="text-center">Sin horarios asignados</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('personal.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('personal.edit', $personal) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection