<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;

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

//Route::get('/', function () {
//return view('dashboard');
//});

Route::get('/dashboard/{id}', [UserController::class, 'index'])->name('dashboard');
Route::get('/user', [UserController::class, 'create'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/user/store', [UserController::class, 'store'])->name('store');
Route::post('/validateLogin', [UserController::class, 'validateLogin'])->name('validateLogin');

Route::get('/income', [IncomeController::class, 'index'])->name('receitas');
Route::get('/income/add', [IncomeController::class, 'create'])->name('addReceitas');
Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->name('editReceitas');
Route::post('/income/store', [IncomeController::class, 'store'])->name('storeIncome');