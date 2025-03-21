<?php
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    $tasks = Task::latest('id')->get();
    return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/task/create', function () {
    return view('create');
})->name('tasks.create');

Route::get('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('detail', ['task' => $task]);
})->name('tasks.detail');

Route::post('/task', function (Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required|max:255',
    ]);
    $task = new Task();
    $task->title = $request->title;
    $task->description = $request->description;
    $task->long_description = $request->long_description;
    $task->completed = false;
    $task->save();
    return redirect()->route('tasks.index');
})->name('tasks.create');
