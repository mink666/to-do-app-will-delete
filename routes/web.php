<?php
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Requests\TaskRequest;

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

Route::post('/task', function (TaskRequest $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required|max:255',
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->completed = false;
    $task->save();
    return redirect()->route('tasks.index');
})->name('tasks.store');

Route::get('/tasks/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('/task/{id}', function (Request $request, $id) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|max:255',
        'long_description' => 'required|max:255',
    ]);
    $task = Task::findOrFail($id);
    $task->title = $request->title;
    $task->description = $request->description;
    $task->long_description = $request->long_description;
    $task->completed = $request->has('completed');
    $task->save();
    return redirect()->route('tasks.index')->with('message', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('tasks.index')->with('message', 'Task deleted successfully!');
})->name('tasks.delete');
