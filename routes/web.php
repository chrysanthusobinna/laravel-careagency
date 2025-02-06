<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainSite\HomeController;
use App\Http\Controllers\MainSite\AboutController;
use App\Http\Controllers\MainSite\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\MainSite\CareerController;
use App\Http\Controllers\MainSite\ContactController;
use App\Http\Controllers\MainSite\FindCarerController;
use App\Http\Controllers\MainSite\SetPasswordController;
use App\Http\Controllers\MainSite\VerifyEmailController;
use App\Http\Controllers\MainSite\HelpAndAdviceController;
use App\Http\Controllers\MainSite\PrivacyPolicyController;
use App\Http\Controllers\MainSite\TermsConditionsController;
use App\Http\Controllers\CareGivers\CareGiverDashboardController;
use App\Http\Controllers\ServiceUsers\ServiceUserDashboardController;

// MAIN SITE ROUTES
Route::get('/', [HomeController::class, 'index'])->name('mainsite.home');
Route::get('/contact', [ContactController::class, 'index'])->name('mainsite.contact');
Route::get('/about', [AboutController::class, 'index'])->name('mainsite.about');
Route::get('/find-carer', [FindCarerController::class, 'index'])->name('mainsite.findcarer');
Route::get('/help-and-advice', [HelpAndAdviceController::class, 'index'])->name('mainsite.helpandadvice');
Route::get('/career', [CareerController::class, 'index'])->name('mainsite.career');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('mainsite.privacy');
Route::get('/terms-condition-carer', [TermsConditionsController::class, 'carerTerms'])->name('mainsite.terms.carer');
Route::get('/terms-condition-service-user', [TermsConditionsController::class, 'serviceUserTerms'])->name('mainsite.terms.serviceuser');


Route::post('/register', [FindCarerController::class, 'register'])->name('mainsite.register.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('mainsite.login');
Route::post('/login', [LoginController::class, 'login'])->name('mainsite.login.submit');
Route::get('/set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('mainsite.set-password');
Route::get('/verify-email', [VerifyEmailController::class, 'showVerifyEmailForm'])->name('mainsite.verify-email');


//SERVICE USERS ROUTES
Route::get('/serviceuser/dashboard', [ServiceUserDashboardController::class, 'index'])->name('serviceuser.dashboard');



// CARE GIVERS ROUTES
Route::get('/caregiver/dashboard', [CareGiverDashboardController::class, 'index'])->name('caregiver.dashboard');


// ADMIN ROUTES
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


 
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });
