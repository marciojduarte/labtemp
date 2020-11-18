@extends('adminlte::page')

@section('title', 'Exames')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('exames.index') }}" class="active">Exames</a></li>
    </ol>

    <h1>Exames <a href="{{ route('exames.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('exames.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exames as $exame)
                        <tr>
                            <td>
                                {{ $exame->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('exames.show', $exame->id) }}" class="btn btn-warning">VER</a>
                                <a href="{{ route('exames.pacientes', $exame->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $exames->appends($filters)->links() !!}
            @else
                {!! $exames->links() !!}
            @endif
        </div>
    </div>
@stop
