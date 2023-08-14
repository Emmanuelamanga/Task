<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

/**
 * when I visit / take me to TaskController to a method called index
 * index -> get all tasks -> send them to welcome
 */

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::get('show-task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::get('create-task', [TaskController::class, 'create'])->middleware(['signed'])->name('task.create');
Route::post('store-post', [TaskController::class, 'store'])->name('task.store');
