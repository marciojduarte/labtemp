@extends('adminlte::page')

@section('title', "Editar a Agenda {$paciente->name}")

@section('content_header')
    <h1>Editar o Perfil {{ $paciente->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('agendas.update', $paciente->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.agendas._partials.form')
            </form>
        </div>
    </div>
@endsection
