@extends('layouts.app')
@section('title', 'Crear Escuela')
@section('content')
<div class="card"><div class="card-header"><h2>Nueva Escuela</h2></div>
<div class="card-body">
    <form action="{{ route('escuelas.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3"><label>CCT</label><input type="text" name="CCT" class="form-control" required maxlength="10"></div>
            <div class="col-md-6 mb-3"><label>Nombre</label><input type="text" name="Nombre" class="form-control" required></div>
            <div class="col-md-4 mb-3"><label>Teléfono</label><input type="text" name="Telefono" class="form-control" required></div>
            <div class="col-md-4 mb-3"><label>Email</label><input type="email" name="Email" class="form-control" required></div>
            <div class="col-md-4 mb-3"><label>Calle</label><input type="text" name="Calle" class="form-control" required></div>
            <div class="col-md-3 mb-3"><label>Número Exterior</label><input type="number" name="NumE" class="form-control" required></div>
            <div class="col-md-3 mb-3"><label>CP</label><input type="number" name="CP" class="form-control" required></div>
            <div class="col-md-2 mb-3"><label>Estado</label><select name="idEstado" class="form-control" required>@foreach($estados as $estado)<option value="{{ $estado->idEstado }}">{{ $estado->Nombre }}</option>@endforeach</select></div>
            <div class="col-md-2 mb-3"><label>Municipio</label><select name="idMunicipio" class="form-control" required>@foreach($municipios as $municipio)<option value="{{ $municipio->idMunicipio }}">{{ $municipio->Nombre }}</option>@endforeach</select></div>
            <div class="col-md-2 mb-3"><label>Localidad</label><select name="idLocalidad" class="form-control" required>@foreach($localidades as $localidad)<option value="{{ $localidad->idLocalidad }}">{{ $localidad->Nombre }}</option>@endforeach</select></div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('escuelas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div></div>
@endsection