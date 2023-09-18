@extends('layouts.app')

@section('title', $task->title)

@section('actions')
    @isset($task)
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-warning">Edit task</a>
        <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}" class="btn btn-danger "><i class="fa fa-trash"></i></a>
    @endisset
@endsection

@section('content')
    <p>
        @if($task->completed)
            <span class="badge text-bg-success"><i class="fa fa-check"></i> Task completed</span>
            - <a href="{{ route('task.toggle-complete', ['task' => $task]) }}" class="text-secondary">set as incompleted</a>
        @else
            <span class="badge text-bg-warning"><i class="fa fa-exclamation-triangle"></i> Task not completed</span>
            - <a href="{{ route('task.toggle-complete', ['task' => $task]) }}" class="text-secondary">set as completed</a>
        @endif


    </p>

    <p>{{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <ul class="list-unstyled">
        <li class="text-secondary"><small><i class="fa fa-calendar"></i> Created: {{ $task->created_at }}</small></li>
        <li class="text-secondary"><small><i class="fa fa-calendar-alt"></i> Edited: {{ $task->updated_at }}</small></li>
    </ul>
@endsection
