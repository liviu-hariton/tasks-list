@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.details', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        There are no tasks
    @endforelse
@endsection
