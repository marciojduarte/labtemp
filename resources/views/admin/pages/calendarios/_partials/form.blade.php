@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>Convênios:</label>
    <select class="form-control" name="convenio_id">
        @foreach($convenios as $convenio)
        <option value={{$convenio->id}} {{(old('convenio_id') == convenio->id?'selected':'')}} >{{$convenio->name}}</option>
        @endforeach

        {{-- @foreach ($convenios as $convenio=> $value)
            <option value="{{$value->id}}" ?? {{(old('id', $calendario->convenio_id) == $value->id ? 'selected' : '')}}> {{$value->name}} </option>
        @endforeach --}}
    </select>
</div>
<div class="form-group">
    <label>Data da coleta:</label>
    <input type="date" name="data" class="form-control" placeholder="Data da coleta:" value="{{ $calendario->data ?? old('data')}}">
</div>
<div class="form-group">
  <label for="">Atendimentos</label>
  <input type="text" name="atendimento"  class="form-control" placeholder="Limite de Atendimentos" value="{{ $calendario->atendimento ?? old('atendimento')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>


