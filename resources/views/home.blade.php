@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Tasks') }}</div>

{{--                <a href="{{ URL::signedRoute('task.create') }}" class="btn btn-success btn-sm mb-2">New Task</a>--}}

                <ul class="list-group">
                    @foreach($tasks as $task)
                        <li class="list-group-item">
                            <a href="{{ route('task.show',$task) }}">{{ $task->id }} : {{ $task->description ?? 'No Description' }}</a>
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
