@extends('layouts.app')
@section('title', 'Detalles de Carrera')
@section('content')
<div class="card">
    <div class="card-header"><h2>{{ $carrera->NombreCarreras }}</h2></div>
    <div class="card-body">
        <table class="table">
            <tr><th>ID:</th><td>{{ $carrera->IdCarrera }}</td></tr>
            <tr><th>Nombre:</th><td>{{ $carrera->NombreCarreras }}</td></tr>
            <tr><th>Estatus:</th><td>{!! $carrera->Estatus ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>' !!}</td></tr>
            <tr><th>Creado:</th><td>{{ $carrera->created_at }}</td></tr>
            <tr><th>Actualizado:</th><td>{{ $carrera->updated_at }}</td></tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-warning">Editar</a>
    </div>
</div>
@endsection