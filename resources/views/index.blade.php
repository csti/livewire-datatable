@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    <div class="mx-auto h-full p-6 flex">
        <div class="w-1/4 h-full bg-gray-800 text-white p-4">
            @foreach ($objects as $object)
            @livewire('endpoint-manager', $object)
            @endforeach
        </div>
        <div class="w-3/4 p-6">
            <h2>Conditions</h2>
            <div class="card">
            <p class="w-full">This is my body content.</p>
            </div>
        </div>
</div>
@endsection