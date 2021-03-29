<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Convenio;

class HomeComponente extends Component
{   public $teste = '20%';

    public function render()
    {
        $convenios = Convenio::where('available','1')->get();
        return view('livewire.home-componente',['convenios'=>$convenios]);
    }
}
