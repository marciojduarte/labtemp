@extends('adminlte::page')

@section('title', 'Cadastrar Nova Agenda')

@section('content_header')
    <h1>Cadastrar Nova Agenda</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('agendas.store') }}" class="form" method="POST">
                @include('admin.pages.agendas._partials.form')
            </form>
        </div>
    </div>
@endsection
