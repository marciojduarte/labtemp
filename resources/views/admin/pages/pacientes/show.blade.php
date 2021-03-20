@extends('adminlte::page')

@section('title', "{$paciente->name}")

@section('content_header')

@stop

@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="cadastro-tab" data-toggle="tab" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="true">Cadastro</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="agenda-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="agenda" aria-selected="false">Agendas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">Contato</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
        <div class="card">
            <div class="card-body" id='pacienteform'>
                <form action="{{ route('pacientes.update', $paciente->id) }}" class="form" method="POST">
                    @method('PUT')

                    @include('admin.pages.pacientes._partials.form')
                </form>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="agenda-tab">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Convênio</th>
                            <th>Solicitante</th>
                            <th>Data</th>
                            <th class= "float-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paciente->agendas as $agenda)
                            <tr>
                                <td>
                                    {{ $agenda->convenio->name }}
                                </td>
                                <td>
                                    {{ $agenda->solicitante->name }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($agenda->calendario->data)->format('d/m/Y')}}
                                </td>
                                <td>
                                    <div class="btn-group float-right">
                                    <a href="{{ route('agenda.exames.index', $agenda->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('paciente.agenda.destroy', [$paciente->id, $agenda->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">...</div>
  </div>


        {{-- <div class="card">
            <div class="card-header">
                <h4>{{ $paciente->name }}</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        <strong>Nome da Mãe: </strong> {{ $paciente->mae }}
                    </li>
                    <li>
                        <strong>Data de Nascimentos: </strong> {{ \Carbon\Carbon::parse($paciente->dataNascimento)->format('d/m/Y')}}
                    </li>
                    <li>
                        <strong>Cartão do SUS: </strong> {{ $paciente->sus }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-muted">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-success active">
                      <input type="radio" name="options" id="option1" autocomplete="off" checked> Agendar
                    </label>
                    <label class="btn btn-info">
                      <input type="radio" name="options" id="option2" autocomplete="off"> Editar
                    </label>
                    <label class="btn btn-danger">
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" claname="options" id="option3" autocomplete="off"> <i class="fas fa-trash"></i>
                        </form>

                    </label>
                  </div>
            </div>
        </div> --}}

@endsection

@section('js')
<script>
//  $(function(){
// $(document).on('click', '.btn', function (event) {
// 	event.preventDefault();
//     $(this).prev('fieldset').removeProp('disabled');
// });
// });
$('#pacienteform').click(function () {
    $('fieldset').prop('disabled', false);
})
</script>

@stop

