<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Visitor
Route::get('/visitor/view', [VisitorController::class, 'index'])->name('user.index');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('formlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('formregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin
Route::middleware(['middleware' => 'auth'])->prefix('admin')->group(function () {
    // View
    Route::get('/view', [AdminController::class, 'index'])->name('admin.index');

    // Add
    Route::get('/add', [AdminController::class, 'tambah'])->name('tambah');
    Route::post('/add/store', [AdminController::class, 'store'])->name('store');

    // Edit
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/edit/update/{id}', [AdminController::class, 'update'])->name('update');

    // Hapus
    Route::get('/hapus/{id}', [AdminController::class, 'hapus'])->name('hapus');
    Route::post('/hapus/destroy', [AdminController::class, 'destroy'])->name('destroy');
});
