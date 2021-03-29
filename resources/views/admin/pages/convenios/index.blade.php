{{-- resources\views\Admin\AgenteDeSaude\lista.blade.php --}}

@extends('adminlte::page')

@section('title', 'Lista de Convenios')

@section('content_header')
{{-- breadcrumb--}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Principal</a></li>
        <li class="breadcrumb-item active" aria-current="page">Convenios</li>
    </ol>
</nav>
{{-- /breadcrumb --}}

@stop

@section('content')

@livewire('convenios.convenio-componente')

@stop

@section('js')
@include('admin.includes.scripts')
<script>
    window.addEventListener('closeModal', event => {
        $("#modalForm").modal('hide');
    })
    window.addEventListener('openModal', event => {
        $("#modalForm").modal('show');
    })
    window.addEventListener('openDeleteModal', event => {
        $("#modalFormDelete").modal('show');
    })
    window.addEventListener('closeDeleteModal', event => {
        $("#modalFormDelete").modal('hide');
    })

    $(document).ready(function(){

        $("#modalForm").on('hidden.bs.modal', function(){
            livewire.emit('forceCloseModal');
        });
    });


    </script>
@stop



