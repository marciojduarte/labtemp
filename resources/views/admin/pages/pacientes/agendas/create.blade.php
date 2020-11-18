@extends('adminlte::page')

@section('title', 'Cadastrar Nova Agenda')

@section('content_header')
    <h1>Cadastrar Nova Agenda para {{ $paciente->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paciente.agenda.store', $paciente->id) }}" class="form" method="POST">
                @include('admin.pages.pacientes.agendas._partials.form')
            </form>
        </div>
    </div>
@endsection

