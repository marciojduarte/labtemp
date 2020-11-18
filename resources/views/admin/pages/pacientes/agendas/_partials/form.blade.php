@include('admin.includes.alerts')

@csrf
<input type="hidden" id="inputOculto" name="paciente_id" value="{{ $paciente->id }}">
<div class="form-group">
    <label>Solicitante:</label>
        <select class="js-solicitante-placeholder-single js-states form-control" name="solicitante_id">
            <option selected>Selecione o Solicitante</option>
            @foreach ($solicitantes as $solicitante)
                <option value="{{ $solicitante->id }}">{{ $solicitante->name }}</option>
            @endforeach
        </select>
</div>
<br>

@livewire('filtro-convenio')

{{-- <div class="form-group">
    <label>Convênios:</label>
    <select class="js-convenio-placeholder-single js-states form-control" name="convenio_id">
            <option selected>Selecione o Convênio</option>
        @foreach ($convenios as $convenio)
            <option value="{{ $convenio->id }}">{{ $convenio->name }}</option>
        @endforeach
    </select>

    <label>Data da coleta:</label>
    <select class="js-data-placeholder-single js-states form-control" name="dataAgendamento">
            <option selected>Selecione a Data</option>
        @foreach ($calendarios as $calendario)
            <option value="{{ $calendario->id }}">{{ $calendario->data }} - {{ $calendario->convenio->name }}</option>
        @endforeach
    </select> --}}

    <label>Exames:</label>
    <select class="js-exames-basic-multiple" name="exames[]" multiple="multiple"  style="width: 100%">
        @foreach ($exames as $exame)
        <option value="{{ $exame->id }}">{{ $exame->name }}</option>
        @endforeach
    </select>



    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop


@section('js')
@livewireScripts
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

{{-- $('.js-convenio-placeholder-single').select2({
    placeholder: "Selecione o Convênio",
    allowClear: true
});
$('.js-data-placeholder-single').select2({
    placeholder: "Selecione a Data",
    allowClear: true
}); --}}
@stop



