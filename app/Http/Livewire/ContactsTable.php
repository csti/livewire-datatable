<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Log;


class ContactsTable extends DataTable
{
   protected function builder()
    {
        return new \App\Contact;
    }
}