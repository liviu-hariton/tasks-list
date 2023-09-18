@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
    @if($tasks->count())
        <ul class="list-group list-group-flush">
        @foreach($tasks as $task)
            <li class="list-group-item">
                <a href="{{ route('tasks.details', ['task' => $task->id]) }}" @class(['text-dark' => !$task->completed, 'text-decoration-line-through text-success' => $task->completed])>{{ $task->title }}</a>
                <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}" title="Delete task" class="text-danger"><i class="fa fa-trash-alt"></i></a>
            </li>
        @endforeach
        </ul>

        {{-- It generates <nav><ul><li> tags --}}
        {{ $tasks->links() }}
    @else
        <div class="alert alert-warning">There are no tasks to display</div>
    @endif
@endsection
