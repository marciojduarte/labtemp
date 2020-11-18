{{-- resources\views\admin\pages\pacientes\agendas\index --}}
@extends('adminlte::page')

@section('title', "Agendamentos")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Pacientes</a></li>
    </ol>

    <h1>Agendamentos</h1>


@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Convênio</th>
                        <th>Solicitante</th>
                        <th>Data</th>
                        <th>Paciente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendas as $agenda)
                        <tr>
                            <td>
                                {{ $agenda->convenio->name }}
                            </td>
                            <td>
                                {{ $agenda->solicitante->name }}
                            </td>
                            <td>
                                {{ $agenda->dataAgendamento }}
                            </td>
                            <td >
                                {{ $agenda->paciente->name }}
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
