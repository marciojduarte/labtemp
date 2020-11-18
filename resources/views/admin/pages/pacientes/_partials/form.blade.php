@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $paciente->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Data de Nascimento:</label>
<input type="date" name="dataNascimento" class="form-control" placeholder="Data de Nascimento:" value="{{ $paciente->dataNascimento ?? old('dataNascimento') }}">
</div>

<div class="form-group">
  <label for="">Carttão SuS</label>
  <input type="text" name="sus" id="" class="form-control" placeholder="Carttão SuS" value="{{ $paciente->sus ?? old('sus') }}" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Insira o número do cartão do SUS</small>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
