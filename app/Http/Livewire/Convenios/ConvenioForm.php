<?php

namespace App\Http\Livewire\Convenios;

use Livewire\Component;
use App\Models\Admin\Convenio;

class ConvenioForm extends Component
{
    public $name;
    public $amout;
    public $modelId;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;
        $convenio = Convenio::find($this->modelId);

        $this->name = $convenio->name;
        $this->amout = $convenio->amout;

    }

    public function save()
    {
        $data = [
            'name'=> $this->name,
            'amout'=>$this->amout
        ];

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshParent');
        $this->cleanVars();

        if($this->modelId){
            Convenio::find($this->modelId)->update($data);
        }else{
            Convenio::create($data);
        }
    }

    private function cleanVars()
    {
        $this->name = null;
        $this->amout = null;
        $this->modelId = null;
    }
    public function render()
    {
        return view('livewire.convenios.convenio-form');
    }
}
