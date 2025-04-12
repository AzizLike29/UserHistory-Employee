<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserStoryController;

Route::get('/', function () {
    return redirect()->route('userstory.index');
});

Route::get('/user-story', [UserStoryController::class, 'index'])->name('userstory.index');
Route::get('/user-story/create', [UserStoryController::class, 'create'])->name('userstory.create');
Route::post('/user-story/store', [UserStoryController::class, 'store'])->name('userstory.store');
Route::get('/user-story/edit/{id}', [UserStoryController::class, 'edit'])->name('userstory.edit');
Route::get('/user-story/show/{id}', [UserStoryController::class, 'show'])->name('userstory.show');
Route::delete('/user-story/delete/{id}', [UserStoryController::class, 'destroy'])->name('userstory.destroy');
Route::put('/user-story/update/{id}', [UserStoryController::class, 'update'])->name('userstory.update');
