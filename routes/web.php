<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/tasks' , [TaskController::class ,"index"])->name('tasks.index');
Route::get('tasks/create' , [TaskController::class ,"create"])->name('tasks.create');
Route::post('tasks/store' , [TaskController::class ,"store"])->name('tasks.store');
Route::get('tasks/destroy/{id}' , [TaskController::class ,"destroy"])->name('tasks.destroy');
Route::get('tasks/edit/{id}' , [TaskController::class ,"edit"])->name('tasks.edit');
Route::post('tasks/update/{id}' , [TaskController::class ,"update"])->name('tasks.update');
Route::get('tasks/search' , [TaskController::class ,"search"])->name('tasks.search');
Route::get('tasks/gerer' , [TaskController::class ,"gerer"])->name('tasks.gerer');
Route::get('tasks/doneTask/{id}' , [TaskController::class ,"doneTask"])->name('tasks.doneTask');
Route::get('tasks/notdoneTask/{id}' , [TaskController::class ,"notdoneTask"])->name('tasks.notdoneTask');


});