<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;

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

Route::get('/', [User\HomeController::class, 'index'])->name('user.home');

Route::get('/login', [Auth\AuthController::class, 'index'])->name('login');
Route::post('/login', [Auth\AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => "admin", 'as' => 'admin.'], function() {
        Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard.index');

        /** Project Routes */
        Route::group(['prefix' => "state"], function(){
            Route::get('', [Admin\StateController::class, 'index'])->name('state.index');
            Route::get('create', [Admin\StateController::class, 'create'])->name('state.create');
            Route::post('store', [Admin\StateController::class, 'store'])->name('state.store');
            Route::get('edit/{state:id}', [Admin\StateController::class, 'edit'])->name('state.edit');
            Route::put('update/{state:id}', [Admin\StateController::class, 'update'])->name('state.update');
        });
    });
});

