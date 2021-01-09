@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Paciente:" value="{{ $paciente->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Mãe:</label>
    <input type="text" name="mae" class="form-control" placeholder="Insira o nome da Mãe:" value="{{ $paciente->mae ?? old('name') }}">
</div>
<div class="row">
    <div class="col">
        <label>Data de Nascimento:</label>
    <input type="date" name="dataNascimento" class="form-control" placeholder="Data de Nascimento:" value="{{ $paciente->dataNascimento ?? old('dataNascimento') }}">
    </div>

    <div class="col">
      <label for="">CNS</label>
      <input type="text" name="sus" id="" class="form-control" placeholder="Cartão SuS" value="{{ $paciente->sus ?? old('sus') }}" aria-describedby="helpId">
      <small id="helpId" class="text-muted">Insira o número do cartão do SUS</small>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
