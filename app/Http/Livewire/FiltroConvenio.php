<?php

namespace App\Http\Livewire;

use App\Models\Admin\Calendario;
use App\Models\Admin\Convenio;
use Livewire\Component;

class FiltroConvenio extends Component
{
    public $filtro;

    public function render()
    {
        $convenios = Convenio::all();

        return view('livewire.filtro-convenio', [
            'calendarios'=> Calendario::where('convenio_id', $this->filtro)->get(),
            'convenios' => $convenios
        ]);
    }
}
