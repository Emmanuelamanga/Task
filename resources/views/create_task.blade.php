@extends('layouts.app')

@section('title', 'Create Task')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="m-auto w-50">
    <h2>Create A New Task</h2>

    <form action="{{ route('task.store') }}" method="post" >
        @csrf
        <div class="form-group">
            <label for="description" class="form-label"> Description</label>
            <textarea name="description" id="description"
                      class="form-control form-control-sm @error('description') is-invalid @enderror">{{old('description')}}</textarea>
           @error('description')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <br>
            <button class="btn btn-sm btn-outline-success">Submit</button>
        </div>
    </form>
    </div>


@endsection

@section('scripts')
    <script>
    </script>
@endsection
