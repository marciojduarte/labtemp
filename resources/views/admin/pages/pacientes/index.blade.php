@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Paciente</a></li>
    </ol>
<h1>Paciente<a href="{{ route('pacientes.create') }}" class="btn btn-dark">Cadastrar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table  id="datatable" class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>
                                {{ $paciente->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-warning">VER</a>
                                <a href="{{ route('paciente.agenda.index', $paciente->id) }}" class="btn btn-warning">Agendamentos</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
