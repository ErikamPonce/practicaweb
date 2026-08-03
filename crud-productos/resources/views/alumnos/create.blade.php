@extends('layouts.app')
@section('title', 'Crear Alumno')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Nuevo Alumno</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Matrícula</label>
                    <input type="text" name="Matricula" class="form-control" required maxlength="20">
                    <small class="text-muted">Ej: A2024001</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Carrera</label>
                    <select name="IdCarrera" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->IdCarrera }}">{{ $carrera->NombreCarreras }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Datos Personales</label>
                    <select name="IdDatosP" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach($datosPersonales as $dp)
                            <option value="{{ $dp->IdDatosP }}">{{ $dp->Nombre }} {{ $dp->ApellidoPaterno }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="Status" class="form-control" required>
                        <option value="A">Activo</option>
                        <option value="B">Baja</option>
                        <option value="G">Graduado</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection