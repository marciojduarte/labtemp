@extends('adminlte::page')

@section('title', "Exames do paciente {$agenda->paciente->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Pacientes</a></li>
</ol>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exames as $exame)
                        <tr>
                            <td>
                                {{ $exame->name }}
                            </td>
                            <td>
                                R$ {{ number_format($exame->price, 2, ',', '.') }}
                            </td>
                            <td style="width=10px;">
                                <form action="{{ route('agenda.exames.destroy', [$agenda->id, $exame->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('agenda.exames.create', $agenda->id) }}" class="btn btn-dark">Adicionar Exames</a>
        <div class="card-footer">
            <div class="small-box bg-info" align ="center">
                <div class="inner">
                    <h3> R$ {{ number_format($agenda->exames()->sum('exames.price'), 2, ',', '.') }}</h3>
                    <p>Total</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                    <div class="small-box-footer">
                        Total do Dia {{ $agenda->calendario->examesdoDia()->sum('price') }} <i class="fas fa-money-check-alt"></i>
                    </div>

    </div>
@stop

@section('js')

@stop
