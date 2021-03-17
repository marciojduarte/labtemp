@include('admin.includes.alerts')

@csrf
<input type="hidden" id="inputOculto" name="paciente_id" value="{{ $paciente->id }}">
<div class="form-group">
    <label>Solicitante:</label>
        <select class="js-placeholder-single js-states form-control" name="solicitante_id">
            <option selected>Selecione o Solicitante</option>
            @foreach ($solicitantes as $solicitante)
                <option value="{{ $solicitante->id }}">{{ $solicitante->name }}</option>
            @endforeach
        </select>
</div>
@livewire('filtro-convenio')

    <div class="form-group">
        <label>Exames:</label>
        <select class="js-exames-basic-multiple" name="exames[]" multiple="multiple"  style="width: 100%">
            @foreach ($exames as $exame)
            <option value="{{ $exame->id }}">{{ $exame->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>




