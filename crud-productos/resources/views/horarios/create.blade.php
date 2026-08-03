@extends('layouts.app')
@section('title', 'Crear Horario')
@section('content')
<div class="card">
    <div class="card-header"><h2>Nuevo Horario</h2></div>
    <div class="card-body">
        <form action="{{ route('horarios.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Día</label>
                    <select name="Dia" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Horario Inicio</label>
                    <input type="time" name="HorarioInicio" class="form-control" required step="1">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Horario Fin</label>
                    <input type="time" name="HorarioFin" class="form-control" required step="1">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Aula</label>
                    <input type="text" name="Aula" class="form-control" required maxlength="50">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection