@extends('layouts.app')

@section('title', 'Example-app')

@section('content')
    <a href="{{ route('tasks.create') }}">Create task</a>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status ? 'DONE' : 'UNCOMPLETE' }}</td>
                    <td><a href="{{ route('tasks.detail', ['id' => $task->id]) }}">Details</a>
                    <td><a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a></td>
                    <td>
                        <form action ="{{ route('tasks.delete', ['id' => $task->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No records found</td>
            </tr>
        @endif
    </table>
@endsection
