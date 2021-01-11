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
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table table-sm" id="datatable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exames as $exame)
                        <tr>
                            <td>
                                {{ $exame->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('exames.show', $exame->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
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

