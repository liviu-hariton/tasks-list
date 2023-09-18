@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'New task')

@section('content')
    <form method="post" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.new') }}">
        @csrf

        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p><span class="badge text-bg-danger">{{ $message }}</span></p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea rows="5" class="form-control" name="description" id="description">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p><span class="badge text-bg-danger">{{ $message }}</span></p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="long_description" class="form-label">Long description</label>
            <textarea rows="10" class="form-control" name="long_description" id="long_description">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p><span class="badge text-bg-danger">{{ $message }}</span></p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-success">
                @isset($task)
                    Edit task
                @else
                    New task
                @endisset

                    <i class="fa fa-chevron-circle-right"></i>
            </button>
        </div>
    </form>
@endsection
