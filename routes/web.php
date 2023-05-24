<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;

use App\Http\Controllers\HomepageController;

use App\Http\Controllers\UserController;


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
Route::get('/jobs', [JobController::class,'showAllJobs'])->name('showAll-jobs');
Route::post('/search-job', [JobController::class, 'search'])->name('search-result');



//Routes for users
Route::get('/user/{id}', [UserController::class, 'show'])->name('showUserDetails');