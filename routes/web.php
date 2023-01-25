<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\todoController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [loginController::class, 'ok'])->name('ok')->middleware('auth');
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/proses_login', [loginController::class, 'proses_login']);

Route::post('/logout', [sessionController::class, 'logout'])->middleware('auth');

Route::get('/register', [registerController::class, 'register'])->middleware('guest');
Route::post('/proses_register', [registerController::class, 'proses_register'])->middleware(('guest'));

// Route::get('/dashboard', [dashboardController::class, 'dashboard']);
// Route::get('/home', [dashboardController::class, 'index']);
Route::get('/dashboard', [dashboardController::class, 'dashboard']);
Route::get('/tambah', [todoController::class, 'add']);
Route::post('proses_tambah', [todoController::class, 'add_todo']);
Route::get('edit{id}', [todoController::class, 'edit']);
Route::post('update', [todoController::class, 'update']);
Route::get('delete{id}', [todoController::class, 'hapus']);

Route::get('cari', [dashboardController::class, 'find'])->middleware('auth');