<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JoblistingController;
use App\Http\Controllers\JobSaveController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckUrl;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

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

// home page

Route::get('/', function () {
    return view('home');
});

// email verification

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');
Route::get('/resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');

// employer registration

Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer')->middleware(CheckAuth::class);
Route::post('/register/employer', [UserController::class, 'storeEmployer'])->name('store.employer');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'postLogin'])->name('login.post')->middleware('guest');


// seeker registration

Route::get('/register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker')->middleware(CheckAuth::class);
Route::post('/register/seeker', [UserController::class, 'storeSeeker'])->name('store.seeker');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');


// about us

Route::get('/about', AboutController::class);

// contact us

Route::get('/contact', ContactController::class);

// profile

Route::get('user/profile/seeker', [UserController::class, 'seekerProfile'])->name('seeker.profile')
    ->middleware(['auth', 'verified']);

Route::post('user/profile', [UserController::class, 'update'])->name('seeker.update')
    ->middleware(['auth', 'verified']);

Route::post('user/password', [UserController::class, 'changePassword'])->name('user.password')->middleware('auth');

// resume

Route::post('upload/resume', [UserController::class, 'uploadResume'])->name('upload.resume')->middleware('auth');
Route::post('/resume/upload', [FileUploadController::class, 'store'])->middleware('auth');

// search for jobs

Route::post('/search', [JoblistingController::class, 'search'])->name('job.search');

// Applicants

Route::post('/applicantion/{listingId}/submit', [ApplicantController::class, 'apply'])->name('applicantion.submit');
Route::post('job/save', [JobSaveController::class, 'jobSave'])->name('save.job');
Route::get('/job/save', [JobSaveController::class, 'index'])->name('save.index');



// Applicant job details

Route::get('/', [JoblistingController::class, 'index'])->name('listing.index');
Route::get('user/job/applied', [UserController::class, 'jobApplied'])->name('job.applied')
    ->middleware(['auth', 'verified']);
Route::get('/jobs/{listing:slug}', [JoblistingController::class, 'show'])->name('job.show');
Route::get('/company/{id}', [JoblistingController::class, 'company'])->name('company');


// admin users

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login')->middleware(CheckUrl::class);
Route::post('admin/login', [AdminController::class, 'postLogin'])->name('admin.post')->middleware(CheckUrl::class);
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => [RoleMiddleware::using('admin')]], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['verified', 'auth'])
        ->name('dashboard');

    // job creation

    Route::get('job/create', [PostJobController::class, 'create'])->name('job.create');
    Route::post('job/store', [PostJobController::class, 'store'])->name('job.store');
    Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
    Route::put('job/{id}/edit', [PostJobController::class, 'update'])->name('job.update');
    Route::get('job', [PostJobController::class, 'index'])->name('job.index');
    Route::delete('job/{listing}/delete', [PostJobController::class, 'destroy'])->name('job.delete');

    // Applicants

    Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
    Route::get('applicants/{listing:slug}', [ApplicantController::class, 'show'])->name('applicants.show');
    Route::post('shortlist/{listingId}/{userId}', [ApplicantController::class, 'shortlist'])
        ->name('applicants.shortlist');

    // subscription

    Route::get('subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    Route::get('pay/weekly', [SubscriptionController::class, 'initiatePayment'])->name('pay.weekly');
    Route::get('pay/monthly', [SubscriptionController::class, 'initiatePayment'])->name('pay.monthly');
    Route::get('pay/yearly', [SubscriptionController::class, 'initiatePayment'])->name('pay.yearly');
    Route::get('payment/success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment/cancel', [SubscriptionController::class, 'cancel'])->name('payment.cancel');

    // admin profile

    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::patch('profile', [AdminController::class, 'update'])->name('admin.update.profile');
    Route::post('password', [AdminController::class, 'changePassword'])->name('admin.password');
});
