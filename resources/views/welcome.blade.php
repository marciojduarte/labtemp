@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Saldo dos Convenios</h1>
@stop

@section('content')
@livewire('home-componente')

@stop

@section('css')

@stop

@section('js')
<script>
    $(document).ready(function(){
        $('.card-title').css('color','red');
        
    })

</script>
@stop
