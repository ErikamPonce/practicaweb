@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">Panel de administración</div>
                <div class="card-body">
                    <p>Solo los usuarios con rol <strong>Administrador</strong> pueden ver esta sección.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
