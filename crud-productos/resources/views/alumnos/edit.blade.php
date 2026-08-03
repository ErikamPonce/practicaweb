@extends('layouts.app')
@section('title', 'Editar Alumno')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Editar Alumno: {{ $alumno->Matricula }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Carrera</label>
                    <select name="IdCarrera" class="form-control" required>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->IdCarrera }}" {{ $alumno->IdCarrera == $carrera->IdCarrera ? 'selected' : '' }}>
                                {{ $carrera->NombreCarreras }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="Status" class="form-control" required>
                        <option value="A" {{ $alumno->Status == 'A' ? 'selected' : '' }}>Activo</option>
                        <option value="B" {{ $alumno->Status == 'B' ? 'selected' : '' }}>Baja</option>
                        <option value="G" {{ $alumno->Status == 'G' ? 'selected' : '' }}>Graduado</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection