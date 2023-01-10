<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RateAllotmentController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', fn () => view('login'))->name('login');
Route::post('login', [AuthController::class, 'loginWeb'])->name('login-action');

Route::group(['middleware' => ['auth:manager']], function () {
    Route::get('/', fn () => view('dashboard.dashboard'))->name('dashboard');

    // Logout
    Route::get('/logout', [AuthController::class, 'logoutWeb'])->name('logout');
    
    // rooms
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
    Route::get('/room/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/room/create', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/room/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/room/{room}/edit', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/room/delete/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    // rate & allotment
    Route::get('/room/{room}/rate-allotment', [RateAllotmentController::class, 'index'])->name('rate-allotment');
    Route::post('/room/{room}/get-rate', [RateAllotmentController::class, 'getAllRate'])->name('get-rate');
    Route::post('/room/{room}/save-rates', [RateAllotmentController::class, 'saveRates'])->name('save-rates');
    Route::post('/room/{room}/get-allotment', [RateAllotmentController::class, 'getAllAllotment'])->name('get-allotment');

    // Property
    Route::get('/property', [PropertyController::class, 'index'])->name('property');

    // Manager
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager');
    Route::post('/manager/email', [ManagerController::class, 'changeEmail'])->name('manager.email');
    Route::post('/manager/password', [ManagerController::class, 'changePassword'])->name('manager.password');
});
