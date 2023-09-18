@extends('layouts.app')

@section('title', 'Edit task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="post" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea rows="5" name="description" id="description">{{ $task->description }}</textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long description</label>
            <textarea rows="10" name="long_description" id="long_description">{{ $task->long_description }}</textarea>
            @error('long_description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Save task</button>
        </div>
    </form>

    <p>
        <a href="{{ route('tasks.index') }}">Tasks list</a> |
        <a href="{{ route('tasks.details', ['task' => $task->id]) }}">Task details</a> |
        <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}">Task delete</a>
    </p>
@endsection
