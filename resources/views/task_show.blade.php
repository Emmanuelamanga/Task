@extends('layouts.app')

@section('title', 'Create Task')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="m-auto w-50">
        <h2>Task Description</h2>

        <div class="card">
            <div class="card-body">
                {{ $task->description  }}
            </div>
            <div class="card-footer">
                {{ $task->created_at }}
                <form action="{{ route('task.destroy', $task->id)  }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="ml-2 btn btn-danger btn-sm float-end">Delete</button>
                </form>
                <a href="{{ route('task.edit', $task->id)  }}" class="mr-2 btn btn-warning btn-sm float-end">Edit</a>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
