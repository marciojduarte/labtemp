@extends('adminlte::page')

@section('title', "Editar o Paciente {$paciente->name}")

@section('content_header')
    <h1>Editar o Perfil {{ $paciente->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pacientes.update', $paciente->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.pacientes._partials.form')
            </form>
        </div>
    </div>
@endsection
