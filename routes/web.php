<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
// use app\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;

use App\Http\Controllers\LogoutController;

use App\Http\Controllers\ReviewController;

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



//RACHID:THIS ROUTE WILL BE REMOVE AND REPLACED WITH ABOVE ROUTE
// Route::get('/home', function () {
//     return view('welcome');
// })->name('welcome');

//=================Routes for jobs (JEAN)====================//
Route::get('/search-form', [JobController::class, 'showForm'])->name('search-form');

//RACHID:I JUST ADDED A COMMENT: THIS ROUTE SHOULD FETCH JOBS BEFORE ADDING PRICE RANGE
Route::post('/search-job', [JobController::class, 'search'])->name('search-result');
//RACHID:SEARCH JOB BASED ON PRICE
//RACHID:GET THE PRICE RANGE
route::post('/search-job-by-price', [JobController::class, 'searchByPrice'])->name('price-range');

//=================Routes for contact page{footer} (JEAN)===========//
Route::get('/contact-us', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');


//==============Routes to get jobs (ADA)====================//
Route::get('/jobs', [JobController::class, 'jobs'])->name('jobs');
Route::get('/jobs/{id}', [JobController::class, 'jobDetails'])->name('jobDetails');


//=============Routes to leave a review (ADA)==========//
Route::get('/review', [ReviewController::class, 'review' ])->name('leaveReview');
Route::post('/review', [ReviewController::class, 'saveReview' ])->name('saveReview');

//THESE ROUTE SHOULD BE ALLOWED ONLY FOR DOERS(===RACHID ADDED THIS ROUTES===)
Route::prefix('/user')->middleware(['auth'])->group(function () {

    //RACHID:REMOVED SHOWCARD ROUTE. IS THE SAME ROUTE AS USER/DOER DASHBOARD
    Route::get('/{id}/dashboard', [JobController::class, 'doerDashboard'])->name('doer-dashboard');
    Route::get('/{id}/create-job', [JobController::class, 'createJob'])->name('create-job');
    Route::post('/store-job', [JobController::class, 'storeJob'])->name('store-job');

    //JEAN: Doer Job detail route
    Route::get('/doer-job-details/{id}', [JobController::class, 'showJobDetailsCreator'])->name('doer-job-details');

    //=============Routes to edit doer profiles (ADA)==========//
    Route::get('/list', [JobController::class, 'list']);
    Route::get('/delete/{id}', [JobController::class, 'delete'])->name('deleteJob');
    Route::get('/edit/{id}', [JobController::class, 'editJob'])->name('editJob');
    Route::get('/update/{id}', [JobController::class, 'showJob'])->name('showJob');
    Route::post('/update/{id}', [JobController::class, 'updateJob'])->name('updateJob');
    Route::get('/testing.Job_success', [JobController::class, 'redirect'])->name('redirect');

    //RACHID:COMSTIMIZE LOGOUT ROUTE
    Route::post('/logout', [LogoutController::class, 'perform'])->name('logout-route');
});


//RACHID:THESE ROUTES ONLY FOR ADMIN
Route::prefix('/{name}')->middleware(['auth', 'admin'])->group(function () {
    //ROUTE TO ADMIN DASHBOARD
    Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('admin-dashboard');
});

//Get cities for each country
Route::post('/get-cities', [JobController::class, 'getCities'])->name('cities');


//AUTHENTICATION ROUTES
Auth::routes();
