<?php

namespace App\Http\Livewire;

use Livewire\Component;

// abstract class DataTable extends Component
// class ContactsTable extends DataTable

use Log;

class DataTable extends Component
{
    protected $fields;
    public $data;
    public $current;
    public $length;
    public $total;
    protected $builder = null;

    public function mount($start = 0, $length = 10) 
    {
        $this->current = $start;
        $this->length = $length;
        $this->total = 0;
    
        // set the data and count params
        $this->fields = $this->getFields();
        $this->total = $this->builder()->count();
        $this->data = $this->getData();
    }

    private function builder()
    {
        return ($this->builder === null) 
            ? $this->builder = new \App\Contact 
            : $this->builder;
    }

    public function prev () 
    {
        $this->current -= $this->length;
        $this->data = $this->getData();
    }

    public function next () 
    {
        $this->current += $this->length;
        $this->data = $this->getData();
    }

    protected function getData() : array
    {
        return $this->builder()->offset($this->current)
                            ->limit($this->length)
                            ->get($this->getFields()->pluck('name')->all())
                            ->toArray();
        
    }
    protected function getFields()
    {
        return collect(
            [
                (Object) ['label' => 'ID', 'name' => 'id'],
                (Object) ['label' => 'Name', 'name' => 'name'],
                (Object) ['label' => 'Email Address', 'name' => 'email'],
                (Object) ['label' => 'Job Title', 'name' => 'title'],
            ]);
    }

    public function render()
    {
        return view('livewire.data-table', ['fields' => $this->fields]);
    }
}
