<div class="row">
    <div class="col">
        <select class="js-placeholder-single js-states form-control"  name="convenio_id">
            <option selected>Selecione o Convênio</option>
                 @foreach ($convenios as $convenio)
                     <option value="{{ $convenio->id }}">{{ $convenio->name }}</option>
                @endforeach
    </select>
    </div>
    <div class="col">
        <select class="js-placeholder-single js-states form-control" name="calendario_id">
            <option selected>Selecione a Data</option>
                @foreach ($calendarios as $calendario)
                    <option value="{{ $calendario->id }}">{{ \Carbon\Carbon::parse($calendario->data)->format('d/m/Y')}} - {{ $calendario->convenio->name }}</option>
                @endforeach
        </select>
    </div>
</div>
