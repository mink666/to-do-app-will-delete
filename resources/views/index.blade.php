<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['name' => 'John Doe']);
});
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
    </head>
    <body>
        <h1>This is USA</h1>

        @isset($name)
            <h1>Welcome back, {{ $name }}</h1>
        @endisset
    </body>
</html>

