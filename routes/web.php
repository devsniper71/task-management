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

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::resource('tasks', 'App\Http\Controllers\TaskController')->except(['show']);
Route::put('tasks/reorder', 'App\Http\Controllers\TaskController@reorder')->name('tasks.reorder');

Route::resource('projects', 'App\Http\Controllers\ProjectController');
