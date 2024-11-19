<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Employees;
use App\Http\Controllers\ResumesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DepartmentController;
use App\Models\AdditionalInformation;





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


//====== Sydney Routes ======

// Dashboard Routes
Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('dashboard');
Route::get('/employees', [UsersController::class, 'show'])->name('dashboard.employees');
Route::post('/employees/store', [UsersController::class, 'store'])->name('dashboard.employees.store');

// User CRUD Routes
Route::get('/users', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}/profile', [UsersController::class, 'profile'])->name('users.profile');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');

// Resumes Routes
Route::resource('resumes', ResumesController::class);
Route::get('/dashboard/resumes/{id}/download', [ResumesController::class, 'download'])->name('resumes.download');
Route::post('/dashboard/resumes/upload', [ResumesController::class, 'store'])->name('resumes.store');

// Event Routes
Route::resource('events', EventController::class);
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// User Profile Routes
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');

// Departments Routes
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');

// Skills Routes

