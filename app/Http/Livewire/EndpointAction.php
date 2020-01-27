<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EndpointAction extends Component
{
    public $action;
    
    public function mount($action)
    {
        $this->action = $action;
    }

    public function toggleActive()
    {
        \App\Models\EndpointAction::find($this->action->id)->update(['active'=> !$this->action->active]);
    }


    public function render()
    {
        return view('livewire.endpoint-action');
    }
}
