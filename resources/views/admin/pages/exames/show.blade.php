@extends('adminlte::page')

@section('title', "Detalhes da Exame {$exame->name}")

@section('content_header')
    <h1>Detalhes da Exame <b>{{ $exame->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $exame->name }}
                </li>
                <li>
                    <strong>Código SUS: </strong> {{ $exame->codSus }}
                </li>
		 <li>
                    <strong>Preço: </strong> {{ $exame->price }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('exames.destroy', $exame->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O EXAME: {{ $exame->name }}</button>
            </form>
        </div>
    </div>
@endsection
