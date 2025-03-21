@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    <p>{{ $task->status ? 'DONE' : 'UNCOMPLETE' }}</p>
    <a href="{{ route('index') }}">Back to menu</a>


@endsection
