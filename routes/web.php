<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController\AuthController;
use App\Http\Controllers\BackendController\AdminController;
use App\Http\Controllers\BackendController\CategoryController;
use App\Http\Controllers\BackendController\CourseController;
use App\Models\Category;

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('password/forgot', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');

// Forgot password
Route::get('admin/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/password/update', [AuthController::class, 'reset'])->name('admin.password.update');

Route::group(['prefix' => 'course'], function () {

    Route::post('admin-login', [AuthController::class, 'AdminLogin'])->name('admin-login');

    Route::middleware(['auth:admin'])->group(function () {



        Route::get('logout', [AuthController::class, 'AdminLogout'])->name('logout');

        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard.index');

        // Admin Routes
        Route::resource('admins', AdminController::class);
        Route::get('admins-status/{id}', [AdminController::class, 'changeStatus'])->name('admin.status');
        Route::get('admins-delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

        // Category
        Route::resource('categories', CategoryController::class);
        Route::get('categories-status/{id}', [CategoryController::class, 'changeStatus'])->name('categories.status');
        Route::get('categories-delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

        // Category
        Route::resource('courses', CourseController::class);
        Route::get('courses-status/{id}', [CourseController::class, 'changeStatus'])->name('courses.status');
        Route::get('courses-delete/{id}', [CourseController::class, 'destroy'])->name('courses.delete');

        // Password Change
        Route::get('change_password', function () {
            return view('admin.change_password');
        })->name('admin.change_password');
        Route::post('update_password', [AuthController::class, 'changePassword'])->name('admin.update_password');
    });
});
