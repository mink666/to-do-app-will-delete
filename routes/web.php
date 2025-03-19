<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/', function() {
    $tasks = Task::latest()->get();
    return view('index',['tasks'=> $tasks]);
});

Route::get('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('show',['task' => $task]);
})->name('tasks.show');

