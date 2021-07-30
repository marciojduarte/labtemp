{{-- resources\views\admin\pages\calendarios\calendarios\index --}}
@extends('adminlte::page')
@section('title', "Calendário")
@section('content_header')
    <h1>Calendário</h1>
    
@stop

@section('content')

    <div class="card">
        <div class="card-header bg-light">
                @if (@isset($editMode))
                @include('admin.pages.calendarios.update')
                @else
                @include('admin.pages.calendarios.create')
                @endif
        </div>
        <div class="card-body">
            <table class="table table-hover table-sm" id="datatable">
                <thead>
                    <tr>
                        <th>Convênio</th>
                        <th>Data</th>
                        <th>Disponívies</th>
                        <th>Total</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calendarios as $calendario)
                        <tr>
                            <td>
                                <a href="{{ route('calendarios.show',$calendario->id)}}"> {{ $calendario->convenio->name }}</a>

                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($calendario->data)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{ $calendario->atendimento - $calendario->limite }}
                            </td>
                            <td>
                                   {{ $calendario->examesdoDia()->sum('price') }}
                            </td>
                            <td style="width=10px;">
                                <div class="btn-group float-right">
                                    <form action="{{ route('calendarios.destroy',$calendario->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                    <a class="btn btn-sm btn-info" href="{{route('calendarios.edit', $calendario->id)}}"><i class="far fa-edit"></i></a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
<script>

$(document).ready(function() {
    $('#datatable').DataTable( {
        ordering: false,
        paging: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
        }
    } );
} );
</script>
@stop

