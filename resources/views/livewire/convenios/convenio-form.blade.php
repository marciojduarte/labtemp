<div>
  <form>
    <div class="form-group">
        <div class="form-group">
          <input type="text" class="form-control" wire:model = "name" placeholder="Nome">
          @if ($errors->has('name'))
              <p style="color: red;">{{$errors->first('name')}}</p>
           @endif
        </div>
        <div class="form-group">
          <input type="text" class="form-control" wire:model = "amout" placeholder="Cota Anual">
          @if ($errors->has('amout'))
               <p style="color: red;">{{$errors->first('amout')}}</p>
          @endif
        </div>
        <div class="col-auto">
          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="autoSizingCheck">
            <label class="form-check-label" for="autoSizingCheck">
              Disponivel
            </label>
          </div>
        </div>
        <div class="col-auto">
           <button type="button" class="btn btn-primary" wire:click="save" >Salvar</button>
        </div>
      </div>
  </form>
</div>
