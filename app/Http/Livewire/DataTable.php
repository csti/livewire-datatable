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
    protected $builder;

    public function mount($start = 0, $length = 10) 
    {
        Log::info('mounting');
        $this->current = $start;
        $this->length = $length;
        $this->total = 0;
    
        $this->builder = new \App\Contact;

        // set the data and count params
        $this->fields = $this->getFields();
        $this->data = $this->getData(true);

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

    public function getData($withTotal = false) : array
    {
        if ($withTotal)
            $this->total = $this->builder->count();
        $data = $this->builder->offset($this->current)
                            ->limit($this->length)
                            ->get();
        
        return $data->toArray();
    }
    public function getFields()
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
