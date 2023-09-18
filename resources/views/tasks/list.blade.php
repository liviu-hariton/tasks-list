@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
    @if($tasks->count())
        <ul class="list-group list-group-flush">
        @foreach($tasks as $task)
            <li class="list-group-item">
                <a href="{{ route('tasks.details', ['task' => $task->id]) }}">{{ $task->title }}</a> | <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}" title="Delete task">(X)</a>
            </li>
        @endforeach
        </ul>

        {{-- It generates <nav><ul><li> tags --}}
        {{ $tasks->links() }}
    @else
        <div class="alert alert-warning">There are no tasks to display</div>
    @endif

    <p><a href="{{ route('tasks.newform') }}">New task+</a></p>
@endsection
