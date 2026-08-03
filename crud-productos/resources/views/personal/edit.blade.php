@extends('layouts.app')
@section('title', 'Editar Personal')
@section('content')
<div class="card">
    <div class="card-header"><h2>Editar Personal: {{ $personal->ClaveEmp }}</h2></div>
    <div class="card-body">
        <form action="{{ route('personal.update', $personal) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tipo de Personal</label>
                    <select name="IdTipo" class="form-control" required>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->idTipo }}" {{ $personal->IdTipo == $tipo->idTipo ? 'selected' : '' }}>
                                {{ $tipo->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select name="Status" class="form-control" required>
                        <option value="1" {{ $personal->Status ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ !$personal->Status ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection