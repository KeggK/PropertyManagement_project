<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;

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

Route::get('/home', function () {
    return view('home');
});



Route::get('/about', [AboutUsController::class,'index'])->name('about-us-page');

Route::get('/', [App\Http\Controllers\HomeController::class,'displayHome'])->name('home_page');