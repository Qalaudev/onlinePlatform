<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\Auth\AuthRegistrationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminPageController;


Route::middleware('auth.login')->group(function () {
Route::resource('course', CourseController::class);
    Route::get('/home', [HomeController::class, 'home'])->name('client.home');
});


Route::resource('category',CategoryController::class);

// Маршруты аутентификации и регистрации без middleware
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthLoginController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthLoginController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/logout', [AuthLoginController::class, 'logout'])->name('auth.logout');
Route::get('/registration', [AuthRegistrationController::class, 'createUser'])->name('auth.registration');
Route::post('/registration', [AuthRegistrationController::class, 'storeUser'])->name('auth.store');

// admin personal page
Route::get('/personal',[AdminPageController::class,'index'])->name('admin.index');
