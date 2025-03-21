<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    $tasks = Task::latest()->get();
    return view('index', ['tasks' => $tasks]);
})->name('index');

Route::get('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('detail', ['task' => $task]);
})->name('tasks.detail');
