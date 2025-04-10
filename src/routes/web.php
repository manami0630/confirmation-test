<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/admin', [UserController::class, 'admin']);
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ContactController::class, 'admin'])->name('admin');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);
Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::get('/admin', [ContactController::class, 'admin'])->name('contacts.admin');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
