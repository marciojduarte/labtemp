@extends('adminlte::page')

@section('title', 'Adicionar Novos Exames')

@section('content_header')
    <h1>Adicionar Novos Exames Para {{ $agenda->paciente->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('agenda.exames.store', $agenda->id) }}" class="form" method="POST">
                @csrf
                <label>Exames:</label>
                <select class="js-exames-basic-multiple" name="exames[]" multiple="multiple"  style="width: 100%">
                    @foreach ($exames as $exame)
                    <option value="{{ $exame->id }}">{{ $exame->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Enviar</button>

            </form>
        </div>
    </div>
@endsection
@section('js')

<script>
    $(document).ready(function() {
        $('.js-exames-basic-multiple').select2({
        placeholder: 'Selecione os Exames'
        });
        $('.js-solicitante-placeholder-single').select2({
            placeholder: "Seleciona o Solicitante",
            allowClear: true
        });
    });
    </script>


@stop
