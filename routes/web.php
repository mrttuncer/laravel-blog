<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CustomerBlogController;
use App\Http\Controllers\CustomerCategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/customer-blogs/{blog}', [CustomerBlogController::class, 'show'])->name('customer-blogs.show');
    Route::get('/customer-blogs', [CustomerBlogController::class, 'index'])->name('customer-blogs.index');
    Route::get('/customer-categories/{category}', [CustomerCategoryController::class, 'show'])->name('customer-categories.show');
    Route::get('/customer-categories', [CustomerCategoryController::class, 'index'])->name('customer-categories.index');


    Route::post('/blogs/{blog}/like', [LikeController::class, 'like'])->name('like');
    Route::delete('/blogs/{blog}/unlike', [LikeController::class, 'unlike'])->name('unlike');


    Route::middleware('admin')->group(function () {
        Route::resource('/blogs', AdminBlogController::class);
        Route::resource('/categories', AdminCategoryController::class);
        Route::get('/change-user-role/{user}', [RoleController::class, 'show'])->name('change-user-role');
        Route::post('/change-user-role/{user}', [RoleController::class, 'changeUserRole'])->name('change-user-role');
        Route::get('/users', [UserController::class, 'index'])->name('users');
    });
});
