<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Exame;

class ExameComponente extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.exame-componente');
    }
}
