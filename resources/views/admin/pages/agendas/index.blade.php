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
            <table class="table table-hover table-sm" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Convênio</th>
                        <th>Solicitante</th>
                        <th>Data</th>
                        <th>Paciente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendas as $agenda)
                        <tr>
                            <td>
                                {{ $agenda->id }}
                            </td>
                            <td>
                                {{ $agenda->convenio->name }}
                            </td>
                            <td>
                                {{ $agenda->solicitante->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($agenda->calendario->data )->format('d/m/Y')}}
                            </td>
                            <td >
                                <a href="{{ route('agenda.exames.index', $agenda->id) }}">{{ $agenda->paciente->name }}</a>

                            </td>
                            <td >
                                {{ $total = $agenda->exames()->sum('price') }}
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            @isset($totalExames)
        {{ $totalExames }}
            @endisset
        </div>
    </div>

@stop

@section('js')
<script>

$(document).ready(function() {
    $('#datatable').DataTable( {
        "ordering": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
        }
    } );
} );
</script>
@stop

