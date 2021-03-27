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

<div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    <H2>Convenios de Saúde</H2>
                </div>
                <div class="col-sm text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastro">Novo</button>
                </div>
            </div>
        </div>
        @include('admin.includes.alerts')
       <div class="card-body">
        {{-- Lista de Convenios --}}
        <table class="table table-sm table" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor da Cota</th>
                    <th>Ação</th>

                </tr>
            </thead>
            <tbody>
                @forelse($convenios as $convenio)
                <tr>
                    <th scope='row'>{{$convenio->id}}</th>
                    <td>{{$convenio->name}}</td>
                    <td>{{$convenio->amout}}</td>
                    <td>
                        <div class="btn-group float-right">
                            <a href="{{route('convenios.show', $convenio->id)}}" class="btn btn-sm btn-warning"><i class="far fa-eye"></i></a>
                            <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#editar{{$convenio->id}}" data-whatever={{$convenio->id}}><i class="far fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#excluir{{$convenio->id}}" data-whatever={{$convenio->id}}><i class="far fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Nada encontrado!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{-- /Lista de Convenios --}}
    </div>'
</div>

{{-- Modal Cadastro --}}
@include('admin.includes.alerts')
  <div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro de Agente de Saúde</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('convenios.store')}}" class="form" method="POST">
                @csrf
                    <div class="form-row">
                        <div class="col-5">
                        <input type="text" name= "nome" class="form-control" placeholder="Nome" >
                        </div>
                        <div class="col">
                        <input type="text" name= "telefone" class="form-control" placeholder="Telefone">
                        </div>
                        <div class="col">
                        <input type="text" name= "regiao" class="form-control" placeholder="Região">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                      </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Editar-->

@foreach($convenios as $convenio)
<div class="modal fade" id="editar{{$convenio->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title" id="exampleModalLabel">Altera - {{$convenio->nome}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('convenios.update', $convenio->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-row">
                        <div class="col-5">
                            <label>Nome</label>
                            <input type="text" name= "name" class="form-control" placeholder="Nome" value="{{ $convenio->nome ?? old('nome') }}">
                        </div>
                        <div class="col">
                            <label>Valor Cota</label>
                            <input type="text" name= "amout" class="form-control" placeholder="Telefone" value="{{ $convenio->telefone ?? old('telefone') }}"">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                      </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Excluir --}}

<div class="modal fade" id="excluir{{ $convenio->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="staticBackdropLabel">Exclusão</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('convenios.destroy', $convenio->id)}}" method="post">
                @csrf
                @method('DELETE')
                Deseja realmente excluir <b>{{ $convenio->nome }}</b>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i>Desistir</button>
          <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">Excluir</i></button>
        </div>
            </form>
      </div>
    </div>
  </div>
@endforeach
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
    </script>
@stop



