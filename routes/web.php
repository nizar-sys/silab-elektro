<?php

use App\Http\Controllers\Console\BorrowController;
use App\Http\Controllers\Console\InventoryController;
use App\Http\Controllers\Console\PermissionController;
use App\Http\Controllers\Console\PracticalController;
use App\Http\Controllers\Console\PracticalValueController;
use App\Http\Controllers\Console\RoleController;
use App\Http\Controllers\Console\RoomController;
use App\Http\Controllers\Console\ScheduleController;
use App\Http\Controllers\Console\StudentController;
use App\Http\Controllers\Console\SubjectController;
use App\Http\Controllers\Console\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'landingPage'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('console')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::patch('/users/profile/{id}', [UserController::class, 'updateDetail'])->name('users.profile.update');
    Route::resource('users', UserController::class);

    // Route::resource('subjects', SubjectController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('schedules', ScheduleController::class);

    Route::resource('inventories', InventoryController::class);
    Route::resource('students', StudentController::class);
    Route::resource('practicals', PracticalController::class);

    Route::resource('practical-values', PracticalValueController::class);
    Route::post('/borrows/action/{borrow}', [BorrowController::class, 'handleAction'])->name('borrows.action.handle');
    Route::resource('borrows', BorrowController::class);
});
