<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardMemberController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BoardController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');

Route::resource('boards', BoardController::class)->middleware(['auth']);
Route::resource('boards.tasks', TaskController::class)->middleware('auth')->shallow();

Route::get('/boards/{board}/members/create', [BoardMemberController::class, 'create'])->name('boards.members.create')->middleware('auth');
Route::post('/boards/{board}/members', [BoardMemberController::class, 'store'])->name('boards.members.store')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
