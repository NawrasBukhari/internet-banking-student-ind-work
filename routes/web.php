<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transactions', [App\Http\Controllers\TransactionsController::class, 'index'])->name('transactions.index');
Route::get('/transactions/pending', [App\Http\Controllers\TransactionsController::class, 'pending']);
Route::get('/transactions/completed', [App\Http\Controllers\TransactionsController::class, 'completed']);
Route::get('/transactions/failed', [App\Http\Controllers\TransactionsController::class, 'failed']);
Route::get('/transactions/deposit', [App\Http\Controllers\TransactionsController::class, 'deposit']);
Route::get('/transactions/withdrawal', [App\Http\Controllers\TransactionsController::class, 'withdrawal']);
Route::get('/transactions/transfer', [App\Http\Controllers\TransactionsController::class, 'transfer']);
Route::get('/transactions/currency/{currency}', [App\Http\Controllers\TransactionsController::class, 'currency']);
Route::post('/transactions', [App\Http\Controllers\TransactionsController::class, 'store'])->name('transactions.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
