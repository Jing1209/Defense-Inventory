<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/employees', 'App\Http\Controllers\EmployeeController');
Route::resource('/sponsors', 'App\Http\Controllers\SponsorController');
Route::resource('/buildings', 'App\Http\Controllers\BuildingController');
Route::resource('/rooms', 'App\Http\Controllers\RoomController');
Route::resource('/categories', 'App\Http\Controllers\CategoryController');
Route::resource('/items', 'App\Http\Controllers\ItemController');
Route::resource('/transactions', 'App\Http\Controllers\TransactionController');
Route::resource('/settings', 'App\Http\Controllers\SettingController');
Route::resource('resets', 'App\Http\Controllers\ResetPasswordController');
Route::get('/allrecord', [PdfController::class, 'allrecord']);
Route::get('/thisweek', [PdfController::class, 'thisweek']);
Route::get('/borrowed', [PdfController::class, 'borrowed']);
Route::get('/returned', [PdfController::class, 'returned']);