@extends('adminlte::page')

@section('title', 'Cadastrar Nova Data')

@section('content_header')
    <h1>Cadastrar Nova Data</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('calendarios.store') }}" class="form" method="POST">
                @include('admin.pages.calendarios._partials.form')
            </form>
        </div>
    </div>
@endsection

