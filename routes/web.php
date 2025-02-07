<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CareGiverMiddleware;
use App\Http\Middleware\AdminLevel2Middleware;
use App\Http\Middleware\ServiceUserMiddleware;
use App\Http\Controllers\MainSite\HomeController;
use App\Http\Controllers\MainSite\AboutController;
use App\Http\Controllers\MainSite\LoginController;
use App\Http\Controllers\MainSite\CarersController;
use App\Http\Controllers\MainSite\FamilyController;
use App\Http\Controllers\MainSite\ContactController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\MainSite\SetPasswordController;
use App\Http\Controllers\MainSite\VerifyEmailController;
use App\Http\Controllers\MainSite\HelpAndAdviceController;
use App\Http\Controllers\MainSite\PrivacyPolicyController;
use App\Http\Controllers\MainSite\TermsConditionsController;
use App\Http\Controllers\CareGivers\CareGiverDashboardController;
use App\Http\Controllers\MainSite\ServiceUsersRegisterController;
use App\Http\Controllers\ServiceUsers\ServiceUserDashboardController;

// MAIN SITE ROUTES
Route::get('/', [HomeController::class, 'index'])->name('mainsite.home');
Route::get('/family', [FamilyController::class, 'index'])->name('mainsite.family');
Route::get('/contact', [ContactController::class, 'index'])->name('mainsite.contact');
Route::get('/about', [AboutController::class, 'index'])->name('mainsite.about');
Route::get('/help-and-advice', [HelpAndAdviceController::class, 'index'])->name('mainsite.helpandadvice');

Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('mainsite.privacy');
Route::get('/terms-condition-carer', [TermsConditionsController::class, 'carerTerms'])->name('mainsite.terms.carer');
Route::get('/terms-condition-service-user', [TermsConditionsController::class, 'serviceUserTerms'])->name('mainsite.terms.serviceuser');
Route::get('/carers', [CarersController::class, 'index'])->name('mainsite.carers');


// MAIN SITE - > GUEST ROUTES
Route::middleware(['guest'])->group(function () {
 
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('mainsite.login');
    Route::post('/login', [LoginController::class, 'login'])->name('mainsite.login.submit');
    Route::get('/set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('mainsite.set-password');
    Route::get('/verify-email', [VerifyEmailController::class, 'showVerifyEmailForm'])->name('mainsite.verify-email');

    Route::get('/serviceuser-register', [ServiceUsersRegisterController::class, 'showRegisterForm'])->name('mainsite.register');
    Route::post('/serviceuser-register', [ServiceUsersRegisterController::class, 'submitRegisterForm'])->name('mainsite.register.submit');

    Route::get('/carers-register', [CarersController::class, 'showRegisterForm'])->name('mainsite.carers.register');
    Route::post('/carers-register', [CarersController::class, 'submitCarerRegister'])->name('mainsite.register.carer.submit');
});





//SERVICE USERS ROUTES
Route::middleware(ServiceUserMiddleware::class)->group(function () {

    Route::get('/serviceuser/dashboard', [ServiceUserDashboardController::class, 'index'])->name('serviceuser.dashboard');

});


// CARE GIVERS ROUTES
Route::middleware(CareGiverMiddleware::class)->group(function () {

    Route::get('/caregiver/dashboard', [CareGiverDashboardController::class, 'index'])->name('caregiver.dashboard');

});



// ADMIN ROUTES
Route::middleware(AdminMiddleware::class)->group(function () {

	Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
});


// ADMIN ROUTES LEVEL 2 ROUTES
Route::middleware(AdminLevel2Middleware::class)->group(function () {
    //Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');

});

 