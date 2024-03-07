<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use App\Http\Controllers\Admin\ProjectController;

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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::resource('admin/projects', ProjectController::class);
Route::put('/admin/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');

Route::prefix('projects')
    ->name('projects.')
    ->group(function () {

    Route::get('/', [GuestProjectController::class, 'index'])->name('index');
    Route::get('/{project}', [GuestProjectController::class, 'show'])->name('show');
    
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

    Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');
   
    Route::resource('projects', AdminProjectController::class);
    
});

require __DIR__.'/auth.php';