@extends('adminlte::page')

@section('title', 'Cadastrar Novo Paciente')

@section('content_header')
    <h1>Cadastrar Novo Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pacientes.store') }}" class="form" method="POST">
                @include('admin.pages.pacientes._partials.form')
            </form>
        </div>
    </div>
@endsection
