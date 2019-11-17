<div>
    <div class="container bg-white shadow-lg mx-auto my-4 rounded-lg p-8">
    <table class="table-standard w-full">
        <tr class="border-gray-600 border-b-2 text-left">
        @foreach ($fields as $field)
            <th>{{$field->label}}</th>
        @endforeach
        </tr>
        @foreach ($data as $item)
        <tr>
            @foreach ($fields as $field)
                <td>{{$item[$field->name]}}</td>
            @endforeach
        </tr>
        @endforeach        
    </table>
    <div class="py-4 text-center">
        <button wire:click="prev" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-8">Prev</button>
        <span class="text-center px-8">{{$current}}-{{$length}} of {{$total}}</span>
        <button wire:click="next" class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-8">Next</button>
    </div>
    </div>
</div>
