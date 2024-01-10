<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PageController::class, 'main'])->middleware('auth')->name('main');

Route::group(['middleware' => ['role:Superadmin']], function () {
    Route::resource('admins', AdminController::class)->middleware('auth');
    Route::resource('products', ProductController::class)->middleware('auth');
    Route::resource('audits', AuditController::class)->middleware('auth');
});



Route::group(['middleware' => ['role:Superadmin|Admin']], function () {
    Route::resource('credits', CreditController::class)->middleware('auth');
});


Route::get('login', [PageController::class, 'login'])->name('login');
Route::post('authenticate', [PageController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [PageController::class, 'logout'])->name('logout');
Route::get('get_search', [PageController::class, 'get_search'])->name('get_search');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


