@extends('adminlte::page')

@section('title', "Detalhes da Agenda {$agenda->tipo}")

@section('content_header')
    <h1>Detalhes da Agenda <b>{{ $agenda->tipo }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Tipo: </strong> {{ $agenda->name }}
                </li>
                <li>
                    <strong>Data de Coleta</strong> {{ $agenda->data }}
                </li>
                <li>
                    <strong>Cartão do SUS: </strong> {{ $agenda->sus }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('agendas.destroy', $agenda->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O PERFIL: {{ $agenda->name }}</button>
            </form>
        </div>
    </div>
@endsection
