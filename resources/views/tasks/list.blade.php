@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.details', ['task' => $task->id]) }}">{{ $task->title }}</a> | <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}" title="Delete task">(X)</a>
        </div>
    @empty
        There are no tasks
    @endforelse

    <p><a href="{{ route('tasks.newform') }}">New task+</a></p>

    @if($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
