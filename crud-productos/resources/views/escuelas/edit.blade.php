@extends('layouts.app')
@section('title', 'Editar Escuela')
@section('content')
<div class="card"><div class="card-header"><h2>Editar Escuela: {{ $escuela->Nombre }}</h2></div>
<div class="card-body">
    <form action="{{ route('escuelas.update', $escuela) }}" method="POST">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3"><label>Nombre</label><input type="text" name="Nombre" class="form-control" value="{{ $escuela->Nombre }}" required></div>
            <div class="col-md-4 mb-3"><label>Teléfono</label><input type="text" name="Telefono" class="form-control" value="{{ $escuela->Telefono }}" required></div>
            <div class="col-md-4 mb-3"><label>Email</label><input type="email" name="Email" class="form-control" value="{{ $escuela->Email }}" required></div>
            <div class="col-md-4 mb-3"><label>Calle</label><input type="text" name="Calle" class="form-control" value="{{ $escuela->Calle }}" required></div>
            <div class="col-md-3 mb-3"><label>Número Exterior</label><input type="number" name="NumE" class="form-control" value="{{ $escuela->NumE }}" required></div>
            <div class="col-md-3 mb-3"><label>CP</label><input type="number" name="CP" class="form-control" value="{{ $escuela->CP }}" required></div>
            <div class="col-md-2 mb-3"><label>Estado</label><select name="idEstado" class="form-control" required>@foreach($estados as $estado)<option value="{{ $estado->idEstado }}" {{ $escuela->idEstado == $estado->idEstado ? 'selected' : '' }}>{{ $estado->Nombre }}</option>@endforeach</select></div>
            <div class="col-md-2 mb-3"><label>Municipio</label><select name="idMunicipio" class="form-control" required>@foreach($municipios as $municipio)<option value="{{ $municipio->idMunicipio }}" {{ $escuela->idMunicipio == $municipio->idMunicipio ? 'selected' : '' }}>{{ $municipio->Nombre }}</option>@endforeach</select></div>
            <div class="col-md-2 mb-3"><label>Localidad</label><select name="idLocalidad" class="form-control" required>@foreach($localidades as $localidad)<option value="{{ $localidad->idLocalidad }}" {{ $escuela->idLocalidad == $localidad->idLocalidad ? 'selected' : '' }}>{{ $localidad->Nombre }}</option>@endforeach</select></div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('escuelas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div></div>
@endsection