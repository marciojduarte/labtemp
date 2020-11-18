@extends('adminlte::page')

@section('title', "Exames do paciente {$paciente->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('pacientes.index') }}" class="active">Pacientes</a></li>
    </ol>

    <h1>Exames do paciente <strong>{{ $paciente->name }}</strong></h1>

    <a href="{{ route('pacientes.exames.available', $paciente->id) }}" class="btn btn-dark">Adicionar Exames</a>

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-sm">
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
                                <a href="{{ route('pacientes.exame.detach', [$paciente->id, $exame->id]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">

        <div class="small-box bg-info">
            <div class="inner">
                <h3> R$ {{ number_format($totalExames, 2, ',', '.') }}</h3>
                <p>Total</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">
                Saldo Total <i class="fas fa-money-check-alt"></i>
            </a>
        </div>
            @if (isset($filters))
                {!! $exames->appends($filters)->links() !!}
            @else
                {!! $exames->links() !!}
            @endif
        </div>
    </div>
@stop

@section('js')

@stop
