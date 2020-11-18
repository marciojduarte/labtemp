@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Página Principal</h1>
@stop

@section('content')
    @livewire('calendario-componente')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    @livewireScripts
@stop
