@extends('layouts.app')

@section('title', 'New task')

@section('content')
    <form method="post" action="{{ route('tasks.new') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea rows="5" name="description" id="description"></textarea>
        </div>
        <div>
            <label for="long_description">Long description</label>
            <textarea rows="10" name="long_description" id="long_description"></textarea>
        </div>
        <div>
            <button type="submit">Add new task</button>
        </div>
    </form>

    <p><a href="{{ route('tasks.index') }}">Back</a></p>
@endsection
