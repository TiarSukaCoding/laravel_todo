@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div>{{ __('ToDo') }}</div>
                </div>
                <div class="card-body">
        </div>
                    <livewire:todo-index></livewire:todo-index>
                </div>
            </div>
        <div class="col-md-2">
            {{-- @if ($statusUp)
                <livewire:update-todo></livewire:update-todo>
            @else
                <livewire:create-todo></livewire:create-todo>
            @endif --}}
            <livewire:create-todo></livewire:create-todo>
            <livewire:update-todo></livewire:update-todo>
            </div>
        </div>
    </div>
</div>
@endsection

