@extends('adminlte::page')

@section('title', "Perfis da permissão {$exame->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('exames.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis da permissão <strong>{{ $exame->name }}</strong></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>
                                {{ $paciente->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('pacientes.exame.detach', [$paciente->id, $exame->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $pacientes->appends($filters)->links() !!}
            @else
                {!! $pacientes->links() !!}
            @endif
        </div>
    </div>
@stop
