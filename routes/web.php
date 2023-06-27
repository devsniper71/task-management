<?php

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

// Redirect the root URL to the tasks index page
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Resourceful routes for tasks, excluding create and show actions
Route::resource('tasks', 'App\Http\Controllers\TaskController')->except(['create', 'show']);

// Route for updating task order
Route::put('tasks/reorder', 'App\Http\Controllers\TaskController@reorder')->name('tasks.reorder');

// Resourceful routes for projects
Route::resource('projects', 'App\Http\Controllers\ProjectController');
