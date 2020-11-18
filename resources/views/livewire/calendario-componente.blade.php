<div>
    <form>
        <div class="form-row">
          <div class="col">
            <div class="form-group">
            <select class="form-control" name="convenio_id">
                <option selected>Selecione o Convenio</option>
                @foreach($convenios as $convenio)
                <option value={{$convenio ->id}}>{{$convenio ->name}}</option>
                @endforeach
            </select>
            </div>
          </div>
          <div class="col">
            <input type="date" class="form-control" placeholder="Data da Coleta" name="data">
          </div>
        </div>
      </form>

    @foreach($calendarios as $calendario)

   <div class="card-group">
       <div class="card">

           <div class="card-body">
               <h4 class="card-title">{{ $calendario ->convenio->name }}</h4>
               <p class="card-text">{{ $calendario ->data }}</p>
           </div>
       </div>

   </div>

    @endforeach

</div>

