<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index', ['name' => 'John Doe']);
// });
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
    </head>
    <body>
        <h1>Example-app</h1>
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
                        <td><a href="{{route ('tasks.detail',['id'=>$task->id])}}">Details</a></td>
                        <td><a href="">Edit</a></td>
                        <td><a href="">Delete</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">No records found</td>
                </tr>
            @endif
        </table>
        @isset($name)
            <h1>Welcome back, {{ $name }}</h1>
        @endisset
    </body>
</html>

