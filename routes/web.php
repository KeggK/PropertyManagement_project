<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AllPropertiesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InsertionController;

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



Route::get('/about', [AboutUsController::class, 'index'])->name('about-us-page');

Route::get('/blog', [PostsController::class, 'index'])->name('blog-page');

Route::post('/blog', [PostsController::class, 'store'])->name('blog-create');

Route::get('/property/{id}', [PropertyController::class, 'show'])->name('single-property');

Route::get('/all-properties', [AllPropertiesController::class, 'index'])->name('all-properties-page');

Route::post('/delete-property/{id}', [PropertyController::class, 'destroy'])->name('delete-property');

Route::get('/property/{id}/edit-property', [PropertyController::class, 'edit'])->name('edit-property-page');

Route::post('/property/{id}/edit-property', [PropertyController::class, 'update'])->name('update-property');

Route::get('/create-new-property', [PropertyController::class, 'index'])->name('new-property-page');

Route::post('/create-new-property', [PropertyController::class, 'store'])->name('property-create');

Route::get('/', [App\Http\Controllers\HomeController::class, 'displayHome'])->name('home_page');
