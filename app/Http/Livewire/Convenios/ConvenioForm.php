<?php

namespace App\Http\Livewire\Convenios;

use Livewire\Component;
use App\Models\Admin\Convenio;

class ConvenioForm extends Component
{
    public $name;
    public $amout;
    public $available;
    public $modelId;

    protected $listeners = [
        'getModelId',
        'forceCloseModal'
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;
        $convenio = Convenio::find($this->modelId);

        $this->name = $convenio->name;
        $this->amout = $convenio->amout;
        $this->available = $convenio->available;

    }

    public function save()
    {
          //Data validation
         $this->validate(
             [
                 'name' => 'required|min:10|max:40',
                 'amout' => 'required',

             ]
         );

        $data = [
            'name'=> $this->name,
            'amout'=>$this->amout,
            'available'=>$this->available,
        ];

        if($this->modelId){
            Convenio::find($this->modelId)->update($data);
        }
        else{
            Convenio::create($data);
        }

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshParent');
        $this->cleanVars();


    }

    public function forceCloseModal(){

        $this->cleanVars();
        // These will reset our error bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    private function cleanVars()
    {
        $this->name = null;
        $this->amout = null;
        $this->available = null;
        $this->modelId = null;
    }
    public function render()
    {
        return view('livewire.convenios.convenio-form');
    }
}
