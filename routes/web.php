<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'viewGroups'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/configuration', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('configuration');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('users.update');

    Route::get('/groups/form', [GroupController::class, 'groupForm'])
    ->middleware(['auth', 'verified'])
    ->name('groups.form');

    Route::post('/groups/create', [GroupController::class, 'newGroup'])
    ->middleware(['auth', 'verified'])
    ->name('groups.save');

    Route::get('/tasks/view/{groupId}', [TaskController::class, 'taskView'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.view');

    Route::get('/tasks/form/{groupId}', [GroupController::class, 'taskForm'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.create');

    Route::post('/tasks/{groupId}/create', [TaskController::class, 'newTask'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.save');

    Route::get('/groups/delete/{id}', [GroupController::class, 'deleteGroup'])
    ->middleware(['auth', 'verified'])
    ->name('groups.delete');

    Route::get('/tasks/delete/{tarea_id}', [TaskController::class, 'deleteTask'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.delete');

    Route::get('/tasks/complete/{tarea_id}', [TaskController::class, 'completeTask'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.complete');
    
    
    Route::get('/groups/join', [GroupController::class, 'sharedForm'])
    ->middleware(['auth', 'verified'])
    ->name('groups.sharedform');

    Route::post('/groups/join', [GroupController::class, 'joinGroup'])
    ->middleware(['auth', 'verified'])
    ->name('groups.join');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
