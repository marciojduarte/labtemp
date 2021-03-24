@foreach ($convenios as $convenio )

<div>
    <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>


        <div class="info-box-content">
        <span class="info-box-text">{{ $convenio->name }}</span>
        <span class="info-box-number">{{$convenio->examesdoConvenio()->sum('price')}}</span>

        <div class="progress">
            <div class="progress-bar" style="width: {{ $teste }}"></div>
        </div>
        <span class="progress-description">
            {{ $teste }}Increase in 30 Days
            </span>
        </div>
</div>

@endforeach


