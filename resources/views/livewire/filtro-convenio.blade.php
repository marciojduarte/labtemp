<div>
    <select class="js-convenio-placeholder-single js-states form-control" name="convenio_id" wire:model='filtro'>
        <option selected>Selecione o Convênio</option>
    @foreach ($convenios as $convenio)
        <option value="{{ $convenio->id }}">{{ $convenio->name }}</option>
    @endforeach
</select>
<br/>

<select class="js-data-placeholder-single js-states form-control" name="dataAgendamento">
    <option selected>Selecione a Data</option>
@foreach ($calendarios as $calendario)
    <option value="{{ $calendario->id }}">{{ \Carbon\Carbon::parse($calendario->data)->format('d/m/Y')}} - {{ $calendario->convenio->name }}</option>
@endforeach
</select>
</div>
