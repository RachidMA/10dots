<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
// use app\Http\Controllers\HomeController;
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

//============Landing Page Routes====================//
Route::prefix('/home')->group(function () {
    Route::get('/', [HomepageController::class, 'showFeaturedJobs'])->name("homepage");
});

Route::get('/', function () {
    return view('welcome');
});

//=================Routes for jobs (JEAN)====================//
Route::get('/search-form', [JobController::class, 'showForm'])->name('search-form');
Route::post('/search-job', [JobController::class, 'search'])->name('search-result');

//=================Routes for contact page{footer} (JEAN)===========//
Route::get('/contact-us', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');


//==============Routes to get jobs (ADA)====================//
Route::get('/jobs', [JobController::class, 'jobs'])->name('jobs');
Route::get('/jobs/{id}', [JobController::class, 'jobDetails'])->name('jobDetails');
Route::get('/update-form', [JobController::class, 'editJob'])->name('jobEdit');
Route::get('/update-form/{id}', [JobController::class, 'updateJob'])->name('jobUpdate');
// Route::view('list', 'testing.Job_edit_form');


//=============Routes to edit doer profiles (ADA)==========//
Route::get('/list', [JobController::class, 'list']);
Route::get('/list', [JobController::class, 'list'])->name('editJob');
Route::get('/delete/{id}', [JobController::class, 'delete'])->name('deleteJob');
Route::get('/edit/{id}', [JobController::class, 'editJob'])->name('editJob');
Route::get('/update/{id}', [JobController::class, 'updateJob'])->name('updateJob');
// Route::post('/update', [JobController::class, 'updateJob'])->name('updateJob');
 
// Route::get('/list', [JobController::class, 'editJob'])->name('editJob');
// Route::get('/delete/{id}', [JobController::class, 'delete'])->name('deleteJob');

//THESE ROUTE SHOULD BE ALLOWED ONLY FOR DOERS(===RACHID ADDED THIS ROUTES===)
Route::prefix('/user')->middleware(['auth'])->group(function () {
    //RACHID: REMOVED /{id} WAS DUBLICATED ROUTE
    //Routes for users
    Route::get('/{id}', [UserController::class, 'showCard'])->name('showCard');
    Route::get('/{id}/dashboard', [JobController::class, 'doerDashboard'])->name('doer-dashboard');
    Route::get('/{id}/create-job', [JobController::class, 'createJob'])->name('create-job');
    Route::post('/store-job', [JobController::class, 'storeJob'])->name('store-job');
});


//AUTHENTICATION ROUTES
Auth::routes();
