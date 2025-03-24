@extends('layouts.app')

@section('styles'){
    .alert-danger: color: red;
}
@endsection
@section('title', 'Edit task')
@section('content')

    <form action = "{{ route('tasks.update',['id'=>$task->id]) }}" method = "POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="long_description">Long description</label>
        <input type="text" name="long_description" id="long_description">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Edit</button>
    </form>
@endsection
