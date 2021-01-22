{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Pacientes do Agente")

@section('content_header')

{{-- breadcrumb--}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Principal</a></li>
      <li class="breadcrumb-item"><a href="/agenteDeSaude">Agentes de Saúde</a></li>
      <li class="breadcrumb-item active" aria-current="page">Lista de Pacientes</li>
    </ol>
</nav>
{{-- /breadcrumb --}}

@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Pacientes do Agente</h1>
    </div>
    <div class="card-body">
        {{-- Lista de pacientes --}}
<table class="table table-sm table" id="datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Cartão Sus</th>
            </tr>
    </thead>
    <tbody>
        @forelse($pacientes as $paciente)
        <tr>
            <th scope='row'>{{$paciente->id}}</th>
            <td>{{$paciente->name}}</td>
            <td>{{$paciente->CartaoSus}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Nada encontrado!</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{-- /Lista de pacientes --}}
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

@stop

@section('js')
@include('admin.includes.scripts')
@stop


