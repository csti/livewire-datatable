<hstack spacing=s>
    <input wire:click="toggleActive" type="checkbox" @if ($action->active)checked @endif />
    <label id="{{strtolower(substr($action->verb, 0,3))}}" class="inline-block w-16 text-sm rounded text-center px-1 py-1">{{$action->verb}}</label> 
    <span>{{$action->action}}</span>
</hstack>