@if ($convenios->count())

<div>

    <div class="row">
        @foreach ($convenios as $convenio )
        <div class="col-lg-3 col">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $convenio->name }}</span>
                        <span class="info-box-number">R${{number_format($convenio->examesdoMes()->sum('price'), 2, ',', '.')}}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ $convenio->porcentagemdoMes()}}%">
                            </div>
                        </div>
                        <span class="progress-description">{{ number_format($convenio->porcentagemdoMes(), 2, ',', '.') }}%Increase in 30 Days</span>
                    </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endif


