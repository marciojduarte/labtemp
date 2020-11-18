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
            'convenios' => Convenio::all(),
            'calendarios' => Calendario::orderBy('data')->get(),
        ]);
    }
}
