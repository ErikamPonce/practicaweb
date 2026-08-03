@extends('layouts.app')
@section('title', 'Editar Carrera')
@section('content')
<div class="card">
    <div class="card-header"><h2>Editar Carrera: {{ $carrera->NombreCarreras }}</h2></div>
    <div class="card-body">
        <form action="{{ route('carreras.update', $carrera) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nombre de la Carrera</label>
                <input type="text" name="NombreCarreras" class="form-control" value="{{ $carrera->NombreCarreras }}" required maxlength="50">
            </div>
            <div class="mb-3">
                <label>Estatus</label>
                <select name="Estatus" class="form-control" required>
                    <option value="1" {{ $carrera->Estatus ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ !$carrera->Estatus ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection