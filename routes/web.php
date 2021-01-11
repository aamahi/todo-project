<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TodoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[TodoController::class,'dashboard'])->name('dashboard');
Route::prefix('/tasks')->group(function (){
    Route::get('/',[TodoController::class,'tasks'])->name('tasks');
    Route::get('/create',[TodoController::class,'create'])->name('createTask');
    Route::post('/create',[TodoController::class,'saveTask'])->name('saveTask');
    Route::get('{id}/softdelete',[TodoController::class,'softdelete'])->name('softDelete');
    Route::get('/deletedTask',[TodoController::class,'deletedTask'])->name('deletedTask');
    Route::get('{id}/restoreTask/',[TodoController::class,'restoreTask'])->name('restoreTask');
});
require __DIR__.'/auth.php';
