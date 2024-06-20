<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AllPropertiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Contact;

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

Route::middleware(['admin'])->group(function () {


Route::get('/home', function () {
    return view('home');
});
});

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/about', [AboutUsController::class, 'index'])->name('about-us-page');
    Route::post('/about', [AboutUsController::class, 'contactUs'])->name('about-contact');
    Route::get('/blog', [PostsController::class, 'index'])->name('blog-page');
    Route::post('/blogfilter', [PostsController::class, 'filter'])->name('filter-blog');
    Route::post('/blog', [PostsController::class, 'store'])->name('blog-create');
    Route::get('/post/{id}', [PostsController::class, 'show'])->name('single-post-page');
    Route::get('/post/{id}/edit-post', [PostsController::class, 'edit'])->name('edit-post-page');
    Route::post('/post/{id}/edit-post', [PostsController::class, 'update'])->name('update-post');
    Route::post('delete-post/{id}', [PostsController::class, 'destroy'])->name('delete-post');


    Route::get('/property/{id}', [PropertyController::class, 'show'])->name('single-property');
    Route::post('/property/{id}', [PropertyController::class, 'sendEmail'])->name('property-contact');
    Route::post('/delete-property/{id}', [PropertyController::class, 'destroy'])->name('delete-property');
    Route::get('/property/{id}/edit-property', [PropertyController::class, 'edit'])->name('edit-property-page');
    Route::post('/property/{id}/edit-property', [PropertyController::class, 'update'])->name('update-property');
    Route::get('/create-new-property', [PropertyController::class, 'index'])->name('new-property-page');
    Route::post('/create-new-property', [PropertyController::class, 'store'])->name('property-create');
    Route::get('/property-forms/{id}/show', [PropertyController::class, 'showPropertyContactForms'])->name('display-property-contacts');

    Route::get('/all-properties', [AllPropertiesController::class, 'index'])->name('all-properties-page');
    Route::get('/for-rent-properties', [AllPropertiesController::class, 'forRentView'])->name('for-rent-properties-page');
    Route::get('/for-sale-properties', [AllPropertiesController::class, 'forSaleView'])->name('for-sale-properties-page');



    Route::get('/myProfile', [AuthController::class, 'viewProfile'])->name('my-profile-page');
    Route::post('/myProfile/{id}/update-my-profile', [AuthController::class, 'update'])->name('update-profile');
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password-page');
    Route::post('/change-password', [AuthController::class, 'passwordUpdate'])->name('update-password');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'displayHome'])->name('home_page');
    Route::post('/make-favourite/{id}', [App\Http\Controllers\HomeController::class, 'makeFavourite'])->name('make-favourite');

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'view'])->name('users-dashboard');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'displayUsers'])->name('users-list');
    Route::get('/properties', [App\Http\Controllers\AdminController::class, 'displayProperties'])->name('properties-list');
    Route::get('/contacts', [App\Http\Controllers\AdminController::class, 'displayQuestions'])->name('contacts-list');


});

// Route::middleware([RedirectIfAuthenticated::class])->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login-page');

    Route::post('/login', [AuthController::class, 'login'])->name('login-create');

    Route::get('/register', [AuthController::class, 'registrationIndex'])->name('register-page');

    Route::post('/register', [AuthController::class, 'registration'])->name('register-create');

    Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');
// });
