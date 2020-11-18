@extends('adminlte::page')

@section('title', 'Cadastrar Novo Exame')

@section('content_header')
    <h1>Cadastrar Novo Exame</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('exames.store') }}" class="form" method="POST">
                @include('admin.pages.exames._partials.form')
            </form>
        </div>
    </div>
@endsection
