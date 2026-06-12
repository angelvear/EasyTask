<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    Route::get('/groups/form', [UserController::class, 'groupForm'])
    ->middleware(['auth', 'verified'])
    ->name('groups.form');

    Route::post('/groups/create', [UserController::class, 'newGroup'])
    ->middleware(['auth', 'verified'])
    ->name('groups.save');

    Route::get('/tasks/view/{groupId}', [UserController::class, 'taskView'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.view');

    Route::get('/tasks/form/{groupId}', [UserController::class, 'taskForm'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.create');

    Route::post('/tasks/{groupId}/create', [UserController::class, 'newTask'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.save');

    Route::get('/groups/delete/{id}', [UserController::class, 'deleteGroup'])
    ->middleware(['auth', 'verified'])
    ->name('groups.delete');
    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
