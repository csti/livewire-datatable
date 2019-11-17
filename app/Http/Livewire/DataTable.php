<?php

namespace App\Http\Livewire;

use Livewire\Component;

// abstract class DataTable extends Component
// class CompaniesTable extends DataTable

class DataTable extends Component
{
    protected $fields;
    public $data;
    public $current;
    public $length;
    public $total;

    public function mount($start) 
    {
        // set the data and count params
        $this->fields = $this->getFields();
        $this->data = $this->getData();

        $this->current = 1;
        $this->length = 2;
        $this->total = 2;
    }

    public function prev () 
    {

    }

    public function next () 
    {

    }

    public function getData() : array
    {
        // Representatives 
        //     Name
        //     Email
        //     Title
        //     Phone
        //     Favorite (Action)
        //     Active (Boolean)
        return [
            ['id' => 1, 'author_name' => 'Cat'],
            ['id' => 2, 'author_name' => 'Daniel']
        ];
    }
    public function getFields()
    {
        return collect(
            [
                (Object) ['label' => 'ID', 'name' => 'id'],
                (Object) ['label' => 'Author Name', 'name' => 'author_name'],
            ]);
    }

    public function render()
    {
        return view('livewire.data-table', ['fields' => $this->fields]);
    }
}
