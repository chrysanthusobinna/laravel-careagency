<?php

use Illuminate\Support\Facades\Route;

use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\BlockBotsMiddleware;
use App\Http\Middleware\CareGiverMiddleware;
use App\Http\Middleware\AdminLevel2Middleware;
use App\Http\Middleware\ServiceUserMiddleware;
use App\Http\Controllers\MainSite\HomeController;
use App\Http\Controllers\MainSite\AboutController;
use App\Http\Controllers\MainSite\LoginController;
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\MainSite\CarersController;
use App\Http\Controllers\MainSite\FamilyController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\MainSite\ContactController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\MainSite\SetPasswordController;
use App\Http\Controllers\MainSite\VerifyEmailController;
use App\Http\Controllers\Admin\AdminCareGiversController;
use App\Http\Controllers\Admin\AdminCareBookingController;
use App\Http\Controllers\Admin\AdminEligibilityController;
use App\Http\Controllers\Admin\AuthAdminProfileController;
use App\Http\Controllers\MainSite\HelpAndAdviceController;
use App\Http\Controllers\MainSite\PrivacyPolicyController;
use App\Http\Controllers\Admin\AdminServiceUsersController;
use App\Http\Controllers\Admin\AdminKnowledgeBaseController;
use App\Http\Controllers\CareGivers\AuthCareGiverController;
use App\Http\Controllers\CareGivers\CareGiverChatController;
use App\Http\Controllers\MainSite\TermsConditionsController;
use App\Http\Controllers\ServiceUsers\AuthServiceUserController;
use App\Http\Controllers\ServiceUsers\ServiceUserChatController;
use App\Http\Controllers\CareGivers\CareGiverDashboardController;
use App\Http\Controllers\MainSite\ServiceUsersRegisterController;
use App\Http\Controllers\CareGivers\CareGiverKnowledgeBaseController;
use App\Http\Controllers\ServiceUsers\ServiceUserDashboardController;
use App\Http\Controllers\ServiceUsers\ServiceUserKnowledgeBaseController;

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


    // Show password reset routes
    Route::get('/set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('mainsite.set-password');
    Route::post('/set-password', [SetPasswordController::class, 'sendResetLink'])->name('mainsite.password.send-link');
    Route::get('/reset-password/{token}', [SetPasswordController::class, 'showResetForm'])->name('mainsite.reset-password');
    Route::post('/reset-password', [SetPasswordController::class, 'resetPassword'])->name('mainsite.password.reset');


    // Password Change Routes
    Route::get('/password/change', [SetPasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/password/update', [SetPasswordController::class, 'updatePassword'])->name('password.update');


    //Verify Email routes
    Route::get('/verify-email', [VerifyEmailController::class, 'showVerifyEmailForm'])->name('mainsite.verify-email');
    Route::post('/verify-email', [VerifyEmailController::class, 'verifyEmail'])->name('mainsite.verify-email.submit');
    Route::post('/resend-activation-token', [VerifyEmailController::class, 'resendActivationToken'])->name('mainsite.resend-activation-token');

    // Apply the BlockBotsMiddleware to registration
    Route::middleware([BlockBotsMiddleware::class, ProtectAgainstSpam::class])->group(function () {
        Route::get('/serviceuser-register', [ServiceUsersRegisterController::class, 'showRegisterForm'])->name('mainsite.register');
        Route::post('/serviceuser-register', [ServiceUsersRegisterController::class, 'submitRegisterForm'])->name('mainsite.register.submit');


        Route::get('/carers-register', [CarersController::class, 'showRegisterForm'])->name('mainsite.carers.register');
        Route::post('/carers-register', [CarersController::class, 'submitCarerRegister'])->name('mainsite.register.carer.submit');
    });

});

//ALL USERS LOGOUT ROUTE
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



//SERVICE USERS ROUTES
Route::prefix('serviceuser')->middleware(ServiceUserMiddleware::class)->group(function () {

    Route::get('/dashboard', [ServiceUserDashboardController::class, 'index'])->name('serviceuser.dashboard');
    Route::get('/chat', [ServiceUserChatController::class, 'index'])->name('serviceuser.chat');
    Route::get('/knowledge-base', [ServiceUserKnowledgeBaseController::class, 'index'])->name('serviceuser.knowledge-base');
    Route::get('/auth-profile', [AuthServiceUserController::class, 'show'])->name('serviceuser.auth-profile.show');

    Route::get('/change-password', [AuthServiceUserController::class, 'showChangePasswordForm'])->name('serviceuser.change-password');
    Route::post('/update-password', [AuthServiceUserController::class, 'updatePassword'])->name('serviceuser.update-password');

});


// CARE GIVERS ROUTES
Route::prefix('caregiver')->middleware(CareGiverMiddleware::class)->group(function () {

    Route::get('/dashboard', [CareGiverDashboardController::class, 'index'])->name('caregiver.dashboard');
    Route::get('/chat', [CareGiverChatController::class, 'index'])->name('caregiver.chat');
    Route::get('/knowledge-base', [CareGiverKnowledgeBaseController::class, 'index'])->name('caregiver.knowledge-base');
    Route::get('/auth-profile', [AuthCareGiverController::class, 'show'])->name('caregiver.auth-profile.show');
    
    Route::get('/change-password', [AuthCareGiverController::class, 'showChangePasswordForm'])->name('caregiver.change-password');
    Route::post('/update-password', [AuthCareGiverController::class, 'updatePassword'])->name('caregiver.update-password');

});



// ADMIN ROUTES
Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {

	Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/chat', [AdminChatController::class, 'index'])->name('admin.chat');

    
    Route::get('/service-users/list', [AdminServiceUsersController::class, 'index'])->name('admin.service-users.index'); 
    Route::get('/service-users/create', [AdminServiceUsersController::class, 'create'])->name('admin.service-users.create');
    Route::post('/service-users/store', [AdminServiceUsersController::class, 'store'])->name('admin.service-users.store');  
    Route::get('/service-users/show/{id}', [AdminServiceUsersController::class, 'show'])->name('admin.service-users.show'); 

    
    Route::get('/eligibility-requests', [AdminEligibilityController::class, 'index'])->name('admin.eligibility-request'); 
    Route::get('/care-booking-request', [AdminCareBookingController::class, 'index'])->name('admin.care-booking-request'); 



    Route::get('/care-givers/list', [AdminCareGiversController::class, 'index'])->name('admin.caregivers.index');
    Route::get('/care-givers/show/{id}', [AdminCareGiversController::class, 'show'])->name('admin.caregivers.show');
    Route::get('/care-givers/create', [AdminCareGiversController::class, 'create'])->name('admin.caregivers.create');
    Route::post('/care-givers/store', [AdminCareGiversController::class, 'store'])->name('admin.caregivers.store');





    Route::get('/admin-users/list', [AdminUsersController::class, 'index'])->name('adminusers.index');
    Route::get('/admin-users/show/{id}', [AdminUsersController::class, 'show'])->name('adminusers.show');
    Route::get('/admin-users/create', [AdminUsersController::class, 'create'])->name('adminusers.create');
    Route::post('/admin-users/store', [AdminUsersController::class, 'store'])->name('adminusers.store');




    Route::get('/auth-profile', [AuthAdminProfileController::class, 'show'])->name('admin.auth-profile.show');
    Route::get('/change-password', [AuthAdminProfileController::class, 'showChangePasswordForm'])->name('admin.change-password');
    Route::post('/update-password', [AuthAdminProfileController::class, 'updatePassword'])->name('admin.update-password');

    Route::get('/knowledge-base', [AdminKnowledgeBaseController::class, 'index'])->name('admin.knowledge-base');

});


// ADMIN ROUTES LEVEL 2 ROUTES
Route::middleware(AdminLevel2Middleware::class)->group(function () {
    //Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');

});

 