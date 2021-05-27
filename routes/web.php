<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchContactController;

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

Route::get('/contacts/search', [SearchContactController::class, 'index']);
Route::post('/contacts/search', [SearchContactController::class, 'store'])->name('search');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('contacts', ContactController::class);
Route::resource('profile', ContactProfileController::class);
