@extends('layouts.app')

@section('title', 'Show Task')

@section('styles')
@endsection

@section('content')
    <div class="m-auto w-50">
        {{ $task->description  }}
        <br>
        {{ $task->created_at->diffForHumans()  }}
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
