@extends('adminlte::page')

@section('title', 'Permissões disponíveis perfil {$paciente->name}')



@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Exames Disponíveis para <strong>{{ $paciente->name }}</strong></h1>

@stop

@section('content')

    <div class="card">
        {{-- <div class="card-header">
            <form action="{{ route('pacientes.exames.available', $paciente->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div> --}}
        <div class="card-body">
            <form action="{{ route('pacientes.exames.attach', $paciente->id) }}" method="POST">
                @csrf
                <select class="js-example-basic-multiple" name="exames[]" multiple="multiple"  style="width: 90%">
                    @foreach ($exames as $exame)
                    <option value="{{ $exame->id }}">{{ $exame->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Vincular</button>


            {{-- <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('pacientes.exames.attach', $paciente->id) }}" method="POST">
                        @csrf

                        @foreach ($exames as $exame)
                            <tr>
                                <td>
                                    <input type="checkbox" name="exames[]" value="{{ $exame->id }}">
                                </td>
                                <td>
                                    {{ $exame->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table> --}}
        </div>
        <div class="card-footer">
            {{-- @if (isset($filters))
                {!! $exames->appends($filters)->links() !!}
            @else
                {!! $exames->links() !!}
            @endif --}}
        </div>
    </div>

  @stop

@section('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
        placeholder: 'Selecione os Exames'
        });
    });
    </script>
@stop


