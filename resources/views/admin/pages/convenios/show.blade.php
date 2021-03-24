{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Calendário do Convenio")

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
        <h1>Calendario do Convenio - {{ $convenio->name }}</h1>
    </div>
    <div class="card-body">
        {{-- calendarios --}}
<table class="table table-sm table" id="datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Convenio</th>
            <th>Data</th>
            <th>Total</th>
            </tr>
    </thead>
    <tbody>
        @forelse($calendarios as $calendario)
        <tr>
            <th scope='row'>{{$calendario->id}}</th>
            <td>{{$calendario->convenio->name}}</td>
            <td>{{ \Carbon\Carbon::parse($calendario->data)->format('d/m/Y')}}</td>
            <td>{{ $calendario->examesdoDia()->sum('price') }}</td>
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


