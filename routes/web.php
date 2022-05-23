<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\MemberController;
use App\Http\Controllers\Master\BookController;
use App\Http\Controllers\Transaction\BookLoanController;
use App\Http\Controllers\Transaction\BookReturnController;

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

Route::get('/', [MemberController::class, 'index']);

Route::get('/books', [BookController::class, 'index']);

Route::get('/book-loan', [BookLoanController::class, 'index']);

Route::post('/book-loan', [BookLoanController::class, 'store']);

Route::get('/return', [BookReturnController::class, 'index']);

Route::post('/return', [BookReturnController::class, 'store']);

