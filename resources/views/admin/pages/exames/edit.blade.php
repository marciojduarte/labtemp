@extends('adminlte::page')

@section('title', "Editar a Exame {$exame->name}")

@section('content_header')
    <h1>Editar a Exame {{ $exame->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('exames.update', $exame->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.exames._partials.form')
            </form>
        </div>
    </div>
@endsection
