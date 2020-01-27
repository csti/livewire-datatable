<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EndpointAction extends Component
{
    public $action;
    public $active;
    
    public function mount($action)
    {
        $this->action = $action;
        $this->active = $action->active;
    }

    public function updatedActive($value)
    {
        \App\Models\EndpointAction::find($this->action->id)->update(['active'=> 0]);
    }
    public function getActionProperty()
    {
        return $this->action;
    }

    public function render()
    {
        return view('livewire.endpoint-action');
    }
}
