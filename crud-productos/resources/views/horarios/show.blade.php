@extends('layouts.app')
@section('title', 'Detalles de Horario')
@section('content')
<div class="card">
    <div class="card-header"><h2>Horario</h2></div>
    <div class="card-body">
        <table class="table">
            <tr><th>ID:</th><td>{{ $horario->idHorario }}</td></tr>
            <tr><th>Día:</th><td>{{ $horario->Dia }}</td></tr>
            <tr><th>Horario Inicio:</th><td>{{ $horario->HorarioInicio }}</td></tr>
            <tr><th>Horario Fin:</th><td>{{ $horario->HorarioFin }}</td></tr>
            <tr><th>Aula:</th><td>{{ $horario->Aula }}</td></tr>
            <tr><th>Creado:</th><td>{{ $horario->created_at }}</td></tr>
            <tr><th>Actualizado:</th><td>{{ $horario->updated_at }}</td></tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection