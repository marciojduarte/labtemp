@extends('adminlte::page')

@section('title', "Detalhes do perfil {$paciente->name}")

@section('content_header')
    <h1>Detalhes do perfil <b>{{ $paciente->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $paciente->name }}
                </li>
                <li>
                    <strong>Data de Nascimentos: </strong> {{ $paciente->dataNascimento }}
                </li>
                <li>
                    <strong>Cartão do SUS: </strong> {{ $paciente->sus }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PERFIL: {{ $paciente->name }}</button>
            </form>
        </div>
    </div>
@endsection
