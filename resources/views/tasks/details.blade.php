@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        <a href="{{ route('tasks.index') }}">Back</a> |
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit task</a> |
        <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}">Task delete</a>
    </p>
@endsection
