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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
<script>
    $(document).ready(function() {
        $('.js-exames-basic-multiple').select2({
        placeholder: 'Selecione os Exames'
        });
        $('.js-placeholder-single').select2({
        });
    });
    </script>
@stop

