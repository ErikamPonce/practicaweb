@extends('layouts.app')
@section('title', 'Crear Carrera')
@section('content')
<div class="card">
    <div class="card-header"><h2>Nueva Carrera</h2></div>
    <div class="card-body">
        <form action="{{ route('carreras.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nombre de la Carrera</label>
                <input type="text" name="NombreCarreras" class="form-control" required maxlength="50">
            </div>
            <div class="mb-3">
                <label>Estatus</label>
                <select name="Estatus" class="form-control" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection