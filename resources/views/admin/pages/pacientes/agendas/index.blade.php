{{-- resources\views\admin\pages\pacientes\agendas\index --}}
@extends('adminlte::page')

@section('title', "Agendamentos {$paciente->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Pacientes</a></li>
    </ol>

    <h1>Agendamentos de <strong>{{ $paciente->name }}</strong></h1>

    <a href="{{ route('paciente.agenda.create', $paciente->id) }}" class="btn btn-dark">Novo Agendamento</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Convênio</th>
                        <th>Solicitante</th>
                        <th style="width: 40px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendas as $agenda)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($agenda->calendario->data)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{ $agenda->convenio->name }}
                            </td>
                            <td>
                                {{ $agenda->solicitante->name }}
                            </td>

                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="{{ route('agenda.exames.index', $agenda->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('paciente.agenda.destroy', [$paciente->id, $agenda->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">

            @if (isset($filters))
                {!! $agendas->appends($filters)->links() !!}
            @else
                {!! $agendas->links() !!}
            @endif
        </div>
    </div>
@stop

@section('js')

@stop
