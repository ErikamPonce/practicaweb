@extends('layouts.app')
@section('title', 'Crear Personal')
@section('content')
<div class="card">
    <div class="card-header"><h2>Nuevo Personal</h2></div>
    <div class="card-body">
        <form action="{{ route('personal.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Clave de Empleado</label>
                    <input type="text" name="ClaveEmp" class="form-control" required maxlength="10">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tipo de Personal</label>
                    <select name="IdTipo" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->idTipo }}">{{ $tipo->Nombre }}</option>
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
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection