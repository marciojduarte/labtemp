@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>Convênios:</label>
    <select class="js-convenio-placeholder-single js-states form-control" name="convenio_id">
            <option selected>Selecione o Convênio</option>
        @foreach ($convenios as $convenio)
            <option value="{{ $convenio->id }}">{{ $convenio->name }}</option>
        @endforeach
    </select>

    <div class="form-group">
        <label>Data da coleta:</label>
    <input type="date" name="data" class="form-control" placeholder="Data da coleta:" >
    </div>


<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

@section('js')
<script>
    $(document).ready(function() {
            $('.js-convenio-placeholder-single').select2({
            placeholder: "Selecione o Convênio",
            allowClear: true
        });
    });

    </script>
@stop


