<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Frontend\SiteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[SiteController::class,'index'])->name('site.home');
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::resource('category', CategoryController::class);
    Route::get('category/trash/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('category/destroys/{category}', [CategoryController::class, 'destroys'])->name('category.destroys');
    Route::get('category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('category/status/{category}', [CategoryController::class, 'status'])->name('category.status');
});