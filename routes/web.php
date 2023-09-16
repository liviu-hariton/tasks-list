<?php

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
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/task/{id}', function ($id) {
    return view('tasks/details', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.details');

Route::view('tasks/new', 'tasks.new')->name('tasks.newform');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.new');

Route::fallback(function (){
    return 'Not found';
});
