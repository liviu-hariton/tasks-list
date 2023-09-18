<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('tasks/list', [
        'tasks' => Task::latest()->paginate(5)
    ]);
})->name('tasks.index');

Route::get('/task/{task}/edit', function (Task $task) {
    return view('tasks/edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/task/{task}', function (Task $task) {
    return view('tasks/details', [
        'task' => $task
    ]);
})->name('tasks.details');

Route::view('tasks/new', 'tasks.new')->name('tasks.newform');

// create new data
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.details', ['task' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.new');

// update existing data
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.details', ['task' => $task->id])
        ->with('success', 'Task updated successfully');
})->name('tasks.update');

// delete data via GET requests (a link)
Route::get('tasks/{task}/delete', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');

// delete existing data via form post (a button) (with method spoofing @method('delete') inside the blade template)
/*Route::delete('tasks/{task}', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');*/

Route::get('task/{task}/toggle-complete', function(Task $task) {
    $task->toggleCompleted();

    return redirect()->route('tasks.details', ['task' => $task])
        ->with('success', 'Task toggled successfully');
})->name('task.toggle-complete');

Route::fallback(function (){
    return 'Not found';
});
