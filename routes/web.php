<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Employees;
use App\Http\Controllers\ResumesController;


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
})->name('index');

Route::get('/dashboard_old', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//======sydney routes======

//Dashboard
Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('dashboard');
Route::get('/employees', [UsersController::class, 'show'])->name('dashboard.employees');
Route::post('/employees/store', [UsersController::class, 'store'])->name('dashboard.employees.store');

//Employee Crud
Route::get('/users', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}/profile', [UsersController::class, 'profile'])->name('users.profile');

//Resumes Crud
Route::resource('resumes', ResumesController::class);
Route::get('/resumes/{id}/download', [ResumesController::class, 'download'])->name('resumes.download');




