@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Página Principal</h1>
@stop

@section('content')
   <div class="card-group">
       <div class="card">
           <img class="card-img-top" data-src="holder.js/100x180/" alt="Card image cap">
           <div class="card-body">
               <h4 class="card-title">Title</h4>
               <p class="card-text">Text</p>
           </div>
       </div>
       <div class="card">
           <img class="card-img-top" data-src="holder.js/100x180/" alt="Card image cap">
           <div class="card-body">
               <h4 class="card-title">Title</h4>
               <p class="card-text">Text</p>
           </div>
       </div>
   </div>
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
