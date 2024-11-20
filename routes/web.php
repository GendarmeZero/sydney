<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ResumesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\AchievementController;
use App\Models\AdditionalInformation;
use App\Http\Controllers\SubscriptionController;






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


//====== Sydney Routes ======

// Landing Page (Publicly Accessible)
Route::get('/', function () {
    return view('landing-page.index');
})->name('index');

// About Page
Route::get('/about', function () {
    return view('landing-page.pages.about-us');
})->name('about');

// Subscription Page
Route::get('/subscription ', function () {
    return view('landing-page.pages.subscription');
})->name('subscription');

// Protected Routes for Admin and Manager Only
Route::middleware(['role:admin,manager'])->group(callback: function () {

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

    // Departments Routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');

    // Skills Routes
    Route::get('/skills', [SkillController::class, 'skillsList'])->name('skills.index');
    Route::post('/skills/add', [SkillController::class, 'addSkill'])->name('skills.add');
    Route::post('skills/assign', [SkillController::class, 'assignSkill'])->name('skills.assign');
    Route::get('skills/{skill}/users', [SkillController::class, 'showUsers'])->name('skills.showUsers');

    // Interviews Routes
    Route::resource('interviews', InterviewController::class)->names(['index' => 'interviews.index']);

    // Achievements Routes

    Route::resource('achievements', AchievementController::class)->names('achievements');
    Route::get('achievements/{achievement}/users', [AchievementController::class, 'showUsers'])->name('achievements.showUsers');
    Route::post('achievements/{achievement}/assign', [AchievementController::class, 'storeAssignment'])->name('achievements.storeAssignment');
    Route::get('achievements/{achievement}/assign', [AchievementController::class, 'assign'])->name('achievements.assign');

// Route to remove assignment from a user
    Route::patch('achievements/{achievement}/remove-assignment/{user}', [AchievementController::class, 'removeAssignment'])->name('achievements.removeAssignment');


});



// User Profile Routes
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');

// Subscription
Route::post('/choose-plan', [SubscriptionController::class, 'choosePlan'])->name('choose.plan');



//Log out
require __DIR__.'/auth.php';



