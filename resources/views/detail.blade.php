<?php

use Illuminate\Support\Facades\Route;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $task->title }}</title>
</head>
<body>
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>{{ $task->long_description }}</p>
    <p>{{ $task->status ? 'DONE' : 'UNCOMPLETE' }}</p>
    <a href="{{ route('index') }}">Back to menu</a>
</body>
</html>
