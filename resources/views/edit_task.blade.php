@extends('layouts.app')

@section('title', 'Create Task')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="m-auto w-50">
        <h2>Update Task</h2>

        <form action="{{ route('task.update', $task->id) }}" method="post" >
            @csrf
            @method('put')
            <div class="form-group">
                <label for="description" class="form-label"> Description</label>
                <textarea name="description" id="description"
                          class="form-control form-control-sm @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>
                @error('description')
                <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
                @enderror
                <br>
                <button class="btn btn-sm btn-outline-success">Update</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
