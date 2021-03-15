<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Exame;

class ExameComponente extends Component
{

    public function render()
    {   $exames = Exame::all();
        return view('livewire.exame-componente',[
            'exames' => $exames
        ]);
    }
}
