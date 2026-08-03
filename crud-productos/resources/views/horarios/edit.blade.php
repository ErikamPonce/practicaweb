@extends('layouts.app')
@section('title', 'Editar Horario')
@section('content')
<div class="card">
    <div class="card-header"><h2>Editar Horario</h2></div>
    <div class="card-body">
        <form action="{{ route('horarios.update', $horario) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Día</label>
                    <select name="Dia" class="form-control" required>
                        <option value="Lunes" {{ $horario->Dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                        <option value="Martes" {{ $horario->Dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                        <option value="Miércoles" {{ $horario->Dia == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                        <option value="Jueves" {{ $horario->Dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                        <option value="Viernes" {{ $horario->Dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                        <option value="Sábado" {{ $horario->Dia == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                        <option value="Domingo" {{ $horario->Dia == 'Domingo' ? 'selected' : '' }}>Domingo</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Horario Inicio</label>
                    <input type="time" name="HorarioInicio" class="form-control" value="{{ $horario->HorarioInicio }}" required step="1">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Horario Fin</label>
                    <input type="time" name="HorarioFin" class="form-control" value="{{ $horario->HorarioFin }}" required step="1">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Aula</label>
                    <input type="text" name="Aula" class="form-control" value="{{ $horario->Aula }}" required maxlength="50">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection