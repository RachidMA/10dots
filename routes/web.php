<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;

use App\Http\Controllers\HomepageController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

//Landing Page Routes
Route::get('/', [HomepageController::class, 'show'])->name("homepage");



//Routes for jobs

// Route::get('/jobs', [JobController::class, 'showFeaturedJobs'])->name('show-featured-jobs');
Route::get('/search-form', [JobController::class, 'showForm'])->name('search-form');
Route::post('/search-job', [JobController::class, 'search'])->name('search-result');



//Routes for users

Route::get('/user/{id}', [UserController::class, 'show'])->name('showUserDetails');


//AUTHENTICATION ROUTES

Route::get('/user}', [UserController::class, 'show'])->name('showUserDetails');
Route::get('/user/{id}', [UserController::class, 'showCard'])->name('showCard');

Auth::routes();
