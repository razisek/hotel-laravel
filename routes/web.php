<?php

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
Route::get('/', fn () => view('dashboard.dashboard'))->name('dashboard');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/room/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/room/create', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/room/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/room/{room}/edit', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('/room/delete/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
