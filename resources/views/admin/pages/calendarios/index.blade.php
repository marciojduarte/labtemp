{{-- resources\views\admin\pages\calendarios\calendarios\index --}}
@extends('adminlte::page')
@section('title', "Calendário")
@section('content_header')
    <h1>Calendário</h1>
    <a href="{{ route('calendarios.create')}}" class="btn btn-dark">Novo Data</a>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>Convênio</th>
                        <th>Data</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calendarios as $calendario)
                        <tr>
                            <td>
                                {{ $calendario->convenio->name }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($calendario->data)->format('d/m/Y')}}
                            </td>
                            <td style="width=10px;">
                                <form action="{{ route('calendarios.destroy',$calendario->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
                {!! $calendarios->links() !!}
        </div>
    </div>
@stop

@section('js')

@stop
