<div class="card">
    <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                Adicionar Convênio
            </button>

                <!-- Modal Form-->
                <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Convênio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('convenios.convenio-form')
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal FormDelete --}}

                <div class="modal fade" id="modalFormDelete" tabindex="-1" aria-labelledby="modalFormDeletePost" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFormDeletePost">Delete Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Você deseja continuar?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button wire:click="delete" type="button" class="btn btn-primary">Sim</button>
                        </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="card-body">
        @if ($convenios->count())
      <table class="table table-striped table-sm">
          <thead>
              <th>ID</th>
              <th>Nome</th>
              <th>Valor da Cota Anual</th>
              <th width="30%">Ações</th>
          </thead>
          <tbody>
              @foreach ($convenios as $convenio)
                  <tr>
                      <td>{{$convenio->id}}</td>
                      <td>{{ $convenio->name}}</td>
                      <td>{{ number_format($convenio->amout, 2, ',', '.') }}</td>
                      <td>
                          <button wire:click="selectedItem({{ $convenio->id }}, 'update')" class="btn btn-sm btn-success">Atualizar</button>
                          <button wire:click="selectedItem({{ $convenio->id }},'delete')" class="btn btn-sm btn-danger">Apagar</button>
                          <button wire:click="selectedItem({{ $convenio->id }}, 'show')" class="btn btn-sm btn-primary">Visualizar</button>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      {{ $convenios->links() }}
     @endif
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

