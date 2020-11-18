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

@livewire('filtro-convenio')


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


@stop



