@extends('adminlte::page')

@section('title', "Editar a calendario {$calendario->data}")

@section('content_header')
    <h1>Editar o Calendario {{ $calendario->data }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('calendarios.update', $calendario->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.calendarios._partials.form')
            </form>
        </div>
    </div>
@endsection
