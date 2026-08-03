@extends('layouts.app')
@section('title', 'Detalles de Escuela')
@section('content')
<div class="card"><div class="card-header"><h2>{{ $escuela->Nombre }}</h2></div>
<div class="card-body">
    <table class="table">
        <tr><th>CCT:</th><td>{{ $escuela->CCT }}</td></tr>
        <tr><th>Nombre:</th><td>{{ $escuela->Nombre }}</td></tr>
        <tr><th>Teléfono:</th><td>{{ $escuela->Telefono }}</td></tr>
        <tr><th>Email:</th><td>{{ $escuela->Email }}</td></tr>
        <tr><th>Dirección:</th><td>{{ $escuela->Calle }} #{{ $escuela->NumE }}, CP {{ $escuela->CP }}</td></tr>
        <tr><th>Localidad:</th><td>{{ $escuela->localidad->Nombre ?? 'N/A' }}</td></tr>
        <tr><th>Municipio:</th><td>{{ $escuela->municipio->Nombre ?? 'N/A' }}</td></tr>
        <tr><th>Estado:</th><td>{{ $escuela->estado->Nombre ?? 'N/A' }}</td></tr>
    </table>
    <a href="{{ route('escuelas.index') }}" class="btn btn-secondary">Volver</a>
</div></div>
@endsection