<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoerContactController;
use App\Http\Controllers\JobController;
// use app\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpamReportController;
use App\Http\Controllers\UserController;
use App\Models\Notification;
use App\Models\User;
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


Route::prefix('/')->group(function () {
    Route::get('/', [HomepageController::class, 'showFeaturedJobs'])->name("homepage");
    Route::get('/search-form', [JobController::class, 'showForm'])->name('search-form');
    Route::post('/search-job', [JobController::class, 'search'])->name('search-result');
    Route::post('/search-job/price-range', [JobController::class, 'searchByPrice'])->name('price-range');
    Route::get('/search-by-link', [JobController::class, 'searchByLink'])->name('search-by-link');
    Route::get('/jobs/{id}', [JobController::class, 'jobDetails'])->name('jobDetails');
    Route::get('/contact-us', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/{jobId}', [DoerContactController::class, 'showContact'])->name('contact.show');
    Route::post('/contact', [DoerContactController::class, 'submitForm'])->name('contact.submitForm');
    Route::get('/about-us', [UserController::class, 'aboutUs'])->name('about-us');
    Route::get('/jobs', [JobController::class, 'jobs'])->name('jobs');
    Route::get('/jobs/{id}', [JobController::class, 'jobDetails'])->name('jobDetails');
    Route::get('/review', [ReviewController::class, 'review'])->name('leaveReview');
    Route::post('/review', [ReviewController::class, 'saveReview'])->name('saveReview');
    Route::post('/report-spam', [SpamReportController::class,  'reportSpam'])->name('report-spam');
    Route::post('/book-doer', [BookingController::class, 'bookDoer'])->name('book-doer');
});





Route::prefix('/user')->middleware(['auth'])->group(function () {

    Route::get('/{id}/dashboard', [JobController::class, 'doerDashboard'])->name('doer-dashboard');
    Route::post('/upload-image', [UserController::class, 'StoreAvatar'])->name('store-avatar');
    Route::get('/create-job', [JobController::class, 'createJob'])->name('create-job');
    Route::post('/store-job', [JobController::class, 'storeJob'])->name('store-job');
    Route::get('/doer-job-details/{id}', [JobController::class, 'showJobDetailsCreator'])->name('doer-job-details');

    Route::get('/edit/{id}', [JobController::class, 'editJob'])->name('editJob');
    Route::get('/update/{id}', [JobController::class, 'showJob'])->name('showJob');
    Route::post('/update/{id}', [JobController::class, 'updateJob'])->name('updateJob');
    Route::get('/delete/{id}', [JobController::class, 'delete'])->name('deleteJob');
    Route::get('/testing.Job_success', [JobController::class, 'redirect'])->name('redirect');

    Route::post('upload-job-image', [JobController::class, 'uploadJobImage'])->name('upload-job-image');

    Route::post('/logout', [LogoutController::class, 'perform'])->name('logout-route');

    //RACHID:ADD ROUTES FOR NOTIFICATIONS AND FOR CONFIMING PENDING BOOKINGS
    Route::get('/notifications/all', [NotificationController::class, 'readAll'])->name('testing.notifications');
    Route::get('/notifications/{id}', [NotificationController::class, 'readSingleNotification'])->name('testing.singleNotification');
});


Route::prefix('/{name}')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::post('/dashboard/doer-profile', [UserController::class, 'adminFindDoer'])->name('admin-find-doer');
});

Route::post('/get-cities', [JobController::class, 'getCities'])->name('cities');

//AUTHENTICATION ROUTES
Auth::routes();
