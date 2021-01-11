@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $exame->name ?? old('name') }}">
</div>
<div class="row">
    <div class="col">
        <label>Codigo SUS:</label>
    <input type="text" name="codSus" class="form-control" placeholder="Código SUS:" value="{{ $exame->codSus ?? old('codSus') }}">
    </div>
    <div class="col">
    <label>Preço</label>
        <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $exame->price ?? old('price') }}">
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>


