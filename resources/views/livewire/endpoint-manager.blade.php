<div>
    <div class="flex mb-6">
    <h2 class="flex-1 m-0 inline-block">{{ $name }}</h2>
    @if (!count($this->endpoints))
        <button wire:click="addDefaultEndpoints" class="text-center bg-blue-700 px-2 py-1">Add</button>
    @endif
    </div>

    @if (count($this->endpoints))
    <div class="pl-6">
        <vstack spacing=s>
            <div>
                <label>Endpoint</label> <input class="ml-4 px-1 text-black" type="text" wire:model.lazy="endpoint_name" />
            </div>
            <div>
                @foreach($this->endpoints as $endpoint)
                <h4>{{$endpoint_name}}{{$endpoint->uri}}</h4>
                <vstack spacing=s>
                    @foreach($endpoint->actions as $action)
                    @livewire('endpoint-action', $action, key($action->id))
                    @endforeach                  
                </vstack>
                @endforeach
                                
            </div>
        </vstack>
    </div>
    @endif
</div>
