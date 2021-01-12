@include('admin.includes.alerts')
<div class="row align-center">
    <div class="form-group col-sm-6">
        <select class="form-control" name="convenio_id">
            <option selected>Selecione o Convênio</option>
            @foreach ($convenios as $convenio)
            <option value="{{ $convenio->id }}">{{ $convenio->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group col-sm-2">
        <input type="date" name="data" class="form-control" placeholder="Data da coleta:" value="{{ $calendario->data ?? old('data')}}">
    </div>
    <div class="form-group col-sm-2">
      <input type="text" name="atendimento"  class="form-control" placeholder="Atendimentos" value="{{ $calendario->atendimento ?? old('atendimento')}}">
    </div>
    <div class="form-group col-auto">
        <button type="submit" class="btn btn-dark">Enviar</button>
    </div>
</div>


