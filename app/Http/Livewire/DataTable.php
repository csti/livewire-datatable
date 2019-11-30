<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Log;

abstract class DataTable extends Component
{
    use WithPagination;

    protected $fields;
    protected $sortFields;
    public $from;
    public $to;
    public $length;
    public $total;
    public $sortField = null;
    public $sortAsc = true;

    public function mount($start = 0, $length = 10) 
    {
        $this->length = $length;
        $this->total = 0;
    
        // set the data and count params
        $this->fields = $this->getFields();
        $this->sortFields = $this->getSortFields($this->fields);
        $this->total = $this->builder()->count();
    }

    abstract protected function builder();

    public function sortBy ($field) 
    {
        if (!$this->sortFields->contains('name', $field)) return;

        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->gotoPage(1);
        $this->sortField = $field;
    }

    public function prev () 
    {
        $this->previousPage();
    }

    public function next () 
    {
        $this->nextPage();
    }


    private function getData() 
    {
        $builder = $this->builder()->select($this->getFields()->pluck('name')->all());

        if ($this->sortField !== null) {
            $builder->orderBy($this->sortField, ($this->sortAsc) ? 'asc' : 'desc');
        }

        $result = $builder->paginate($this->length);

        $this->from = $result->firstItem();
        $this->to = $result->lastItem();

        return $result;
        
    }

    private function getSortFields(Collection $fields)
    {
        return $fields->filter(function ($item) {
            return !(empty($item->sortable));
        });
    }
    private function getFields()
    {
        return collect(
            [
                (Object) ['label' => 'ID', 'name' => 'id',  'sortable' => true],
                (Object) ['label' => 'Name', 'name' => 'name', 'sortable' => true],
                (Object) ['label' => 'Email Address', 'name' => 'email'],
                (Object) ['label' => 'Job Title', 'name' => 'title'],
            ]);
    }

    public function render()
    {
        return view('livewire.data-table', ['fields' => $this->fields,
                                        'contacts' => $this->getData()
                                        ]);
    }
}
