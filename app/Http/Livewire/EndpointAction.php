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

    public function getActionProperty()
    {
        return $this->action;
    }

    public function render()
    {
        return view('livewire.endpoint-action');
    }
}
