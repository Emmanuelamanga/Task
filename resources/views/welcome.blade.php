@extends('layouts.app')

@section('title', "All Tasks")

@section('content')
    <h2>list of all tasks</h2>

    <a href="{{ URL::signedRoute('task.create') }}" class="btn btn-success btn-sm mb-2">New Task</a>

    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item">
                <a href="{{ route('task.show',$task) }}">{{ $task->id }} : {{ $task->description ?? 'No Description' }}</a>
            </li>
        @endforeach
    </ul>
@endsection
