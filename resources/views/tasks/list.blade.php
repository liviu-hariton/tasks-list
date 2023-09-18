@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.details', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        There are no tasks
    @endforelse

    <p><a href="{{ route('tasks.newform') }}">New task+</a></p>
@endsection
