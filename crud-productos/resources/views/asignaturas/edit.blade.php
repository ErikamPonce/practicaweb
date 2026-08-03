@extends('layouts.app')
@section('title', 'Editar Asignatura')
@section('content')
<div class="card">
    <div class="card-header"><h2>Editar Asignatura: {{ $asignatura->Nombre }}</h2></div>
    <div class="card-body">
        <form action="{{ route('asignaturas.update', $asignatura) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nombre de la Asignatura</label>
                <input type="text" name="Nombre" class="form-control" value="{{ $asignatura->Nombre }}" required maxlength="50">
            </div>
            <div class="mb-3">
                <label>Horas Totales</label>
                <input type="number" name="HorasTotales" class="form-control" value="{{ $asignatura->HorasTotales }}" required min="1" max="500">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection