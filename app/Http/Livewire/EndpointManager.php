<?php

namespace App\Http\Livewire;

use App\Models\DbObject;
use App\Models\Endpoint;
use App\Models\EndpointAction;
use Livewire\Component;

class EndpointManager extends Component
{
    public $name;
    public $object_id;
    public $endpoint_name;
    protected $endpoints;

    public function mount($object)
    {
        $this->name = $object->name;
        $this->endpoint_name = $object->slug;
        $this->object_id = $object->id;
    }

    public function addDefaultEndpoints () 
    {
        $object = DbObject::find($this->object_id);
        $endpoints1 = factory(Endpoint::class)
                    ->create(['name'=> $object->slug, 'uri' => '/']);
        $endpoints1->each(function($endpoint) {
                        $endpoint->actions()->saveMany([
                            factory(EndpointAction::class)->state('index')->make(),
                            factory(EndpointAction::class)->state('store')->make(),
                        ]);
                    });

        $endpoints2 = factory(Endpoint::class)
                    ->create(['name'=> $object->slug, 'uri' => '/{id}/']);
        $endpoints2->each(function($endpoint) {
                        $endpoint->actions()->saveMany([
                            factory(EndpointAction::class)->state('show')->make(),
                            factory(EndpointAction::class)->state('update')->make(),
                            factory(EndpointAction::class)->state('delete')->make(),
                        ]);
                    });
        $object->endpoints()->save($endpoints1);
        $object->endpoints()->save($endpoints2);
    }

    public function getEndpointsProperty () 
    {
        $endpoints = Endpoint::with('actions')->where('object_id', $this->object_id)->get();

        return $endpoints;
    }

    public function render()
    {
        return view('livewire.endpoint-manager');
    }
}
