@include('admin.includes.alerts')
<div class="form-row">
    <div class="col-5">
      <input type="text" name= "nome" class="form-control" placeholder="Nome" value="{{ $registro->nome ?? old('nome') }}">
    </div>
    <div class="col">
      <input type="text" name= "telefone" class="form-control" placeholder="Telefone" value="{{ $registro->telefone ?? old('telefone') }}"">
    </div>
    <div class="col">
      <input type="text" name= "regiao" class="form-control" placeholder="Região" value="{{ $registro->regiao ?? old('regiao') }}">
    </div>
      <button type="submit" class="btn btn-primary">Adicionar</button>
</div>
