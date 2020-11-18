@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="id_paciente">Paciente:</label>
    <select class="js-paciente-placeholder-single js-states form-control" name="paciente_id" id="id_paciente">
            <option selected>Selecione o Paciente</option>
        @foreach ($pacientes as $paciente)
            <option value="{{ $paciente->id }}">{{ $paciente->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Solicitante:</label>
        <select class="js-solicitante-placeholder-single js-states form-control" name="solicitante_id">
            <option selected>Selecione o Solicitante</option>
            @foreach ($solicitantes as $solicitante)
                <option value="{{ $solicitante->id }}">{{ $solicitante->name }}</option>
            @endforeach
        </select>
</div>

<div class="form-group">
    <label>Convênios:</label>
    <select class="js-convenio-placeholder-single js-states form-control" name="paciente_id">
            <option selected>Selecione o Convênio</option>
        @foreach ($convenios as $convenio)
            <option value="{{ $convenio->id }}">{{ $convenio->name }}</option>
        @endforeach
    </select>

    <div class="form-group">
        <label>Data da coleta:</label>
    <input type="date" name="dataAgendamento" class="form-control" placeholder="Data da coleta:" >
    </div>
<div class="form-group">
    <select class="js-exames-basic-multiple" name="exames[]" multiple="multiple"  style="width: 90%">
        @foreach ($exames as $exame)
        <option value="{{ $exame->id }}">{{ $exame->name }}</option>
        @endforeach
    </select>
    @include('admin.includes.alerts')
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>



@section('js')
<script>
$(document).ready(function() {
        $('.js-exames-basic-multiple').select2({
              placeholder: 'Selecione os Exames'
        });
        $('.js-paciente-placeholder-single').select2({
            placeholder: "Selecione o Paciente",
            allowClear: true
        });
        $('.js-solicitante-placeholder-single').select2({
            placeholder: "Seleciona o Solicitante",
            allowClear: true
        });
        $('.js-convenio-placeholder-single').select2({
            placeholder: "Selecione o Convênio",
            allowClear: true
        });
            });

    </script>
@stop
