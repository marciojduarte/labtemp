@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $exame->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Codigo SUS:</label>
<input type="text" name="codSus" class="form-control" placeholder="Código SUS:" value="{{ $exame->codSus ?? old('codSus') }}">
</div>
<label>Preço</label>
    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $exame->price ?? old('price') }}">
</div>
<div class="form-group">
    <select class="js-exames-basic-multiple" name="exames[]" multiple="multiple"  style="width: 90%">
        @foreach ($exames as $exame)
        <option value="{{ $exame->id }}">{{ $exame->name }}</option>
        @endforeach
    </select>
    @include('admin.includes.alerts')
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>

