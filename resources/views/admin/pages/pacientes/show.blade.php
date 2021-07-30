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
      <a class="nav-link" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda" aria-selected="false">Agendas</a>
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
    <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
        @include('admin.pages.pacientes.agendas._partials.agenda')
    </div>
    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">...</div>
  </div>
@endsection

@section('js')
    <script>
        $('#pacienteform').click(function () {
            $('fieldset').prop('disabled', false);
        })
    </script>
@stop

