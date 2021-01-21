
<div class="row">
@foreach($calendarios as $calendario)
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header text-center">
                <h5>{{ $calendario ->convenio->name }}</h5>
                <p class="card-text"> {{ \Carbon\Carbon::parse($calendario->data)->format('d/m/Y')}}</p>
            </div>
            <div class="card-body">
            @foreach($calendario->agendas as $agenda)
                <p class="card-text">{{ $agenda->paciente->name }}</p>
            @endforeach
            </div>
            <div class="card-footer text-muted">
            Footer
            </div>
        </div>
    </div>
@endforeach
</div>


