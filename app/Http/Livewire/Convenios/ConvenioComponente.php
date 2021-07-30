<?php

namespace App\Http\Livewire\Convenios;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Convenio;

class ConvenioComponente extends Component
{
    use WithPagination;
    public $action;
    public $selectedItem;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function selectedItem($id, $action)
    {
        $this->selectedItem = $id;
        if($action == 'delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        } else{
            $this->emit('getModelId',$this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function delete()
    {
        Convenio::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }
    public function render()
    {
        return view('livewire.convenios.convenio-componente',[
            'convenios'=>Convenio::paginate()
        ]);
    }
}
