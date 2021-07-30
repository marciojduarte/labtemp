@extends('adminlte::page')

@section('title', 'Exames')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('exames.index') }}" class="active">Exames</a></li>
    </ol>

    <h1>Exames <a href="{{ route('exames.create') }}" class="btn btn-dark">Cadastra</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table-striped table-sm" id="datatable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exames as $exame)
                        <tr>
                            <td>
                                {{ $exame->name }}
                            </td>
                            <td class="btn btn-group">
                                <a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('exames.show', $exame->id) }}" class="btn btn-sm btn-warning">VER</a>
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

