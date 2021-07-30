@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Paciente</a></li>
    </ol>
<h1>Paciente</h1>
<a href="{{ route('pacientes.create') }}" class="btn btn-dark">Cadastrar</a>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table  id="datatable" class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th style="width: 40px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>
                                <a href="{{ route('pacientes.show', $paciente->id) }}">{{ $paciente->name }}</a>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($paciente->dataNascimento)->format('d/m/Y')}}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="{{ route('paciente.agenda.index', $paciente->id) }}" class="btn btn-warning"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
@include('admin.pages.componetes.datatable')
@stop
