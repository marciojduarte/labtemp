@extends('adminlte::page')

@section('title', 'Exames disponíveis para {$paciente->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Exames Disponíveis para <strong>{{ $paciente->name }}</strong></h1>

@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <form action="{{ route('pacientes.exames.attach', $paciente->id) }}" method="POST">
                @csrf
                <select class="js-exames-basic-multiple" name="exames[]" multiple="multiple"  style="width: 90%">
                    @foreach ($exames as $exame)
                    <option value="{{ $exame->id }}">{{ $exame->name }}</option>
                    @endforeach
                </select>
                @include('admin.includes.alerts')
                <button type="submit" class="btn btn-primary">Vincular</button>
        </div>
    </div>
  @stop

@section('js')
<script>
    $(document).ready(function() {
        $('.js-exames-basic-multiple').select2({
        placeholder: 'Selecione os Exames'
        });
    });
    </script>
@stop


