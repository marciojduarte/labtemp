<?php

namespace App\Http\Livewire;

use App\Models\Admin\Calendario;
use App\Models\Admin\Convenio;
use Livewire\Component;

class CalendarioComponente extends Component
{

    public function render()
    {
        return view('livewire.calendario-componente', [
                    'calendarios' => Calendario::orderBy('data')
                                                ->where('data','>=', date("Y-m-d"))
                                                ->get(),
        ]);
    }
}
