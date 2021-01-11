<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Agenda;
use App\Models\Admin\Convenio;
use Illuminate\Support\Carbon;
use App\Models\Admin\Calendario;

class FiltroConvenio extends Component
{
    public $filtro;

    public function render()
    {
        $convenios = Convenio::all();

        return view('livewire.filtro-convenio', [
            'calendarios'=> Calendario::where('convenio_id', $this->filtro)
                            ->Where('data', '>=', Carbon::now()) //tambem pode usar  date("Y-m-d")
                            ->whereColumn('limite', '<', 'atendimento')
                            ->get(),
            'convenios' => $convenios
        ]);
    }
}
