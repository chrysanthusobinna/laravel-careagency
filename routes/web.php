<?php

use Illuminate\Support\Facades\Route;

use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\BlockBotsMiddleware;
use App\Http\Middleware\CareGiverMiddleware;
use App\Http\Middleware\AdminLevel2Middleware;
use App\Http\Middleware\FamilyMemberMiddleware;
use App\Http\Controllers\MainSite\HomeController;
use App\Http\Controllers\MainSite\AboutController;
use App\Http\Controllers\MainSite\LoginController;
use App\Http\Middleware\CareBeneficiaryMiddleware;
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\MainSite\CarersController;
use App\Http\Controllers\MainSite\FamilyController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\MainSite\ContactController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\EligibilityResponseController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\MainSite\SetPasswordController;
use App\Http\Controllers\MainSite\VerifyEmailController;
use App\Http\Controllers\Admin\AdminCareGiversController;
use App\Http\Controllers\Admin\AdminCareBookingController;
use App\Http\Controllers\Admin\AdminEligibilityController;
use App\Http\Controllers\Admin\AuthAdminProfileController;
use App\Http\Controllers\MainSite\HelpAndAdviceController;
use App\Http\Controllers\MainSite\PrivacyPolicyController;
use App\Http\Controllers\Admin\AdminFamilyMemberController;
use App\Http\Controllers\Admin\AdminFamilyMembersController;
use App\Http\Controllers\Admin\AdminKnowledgeBaseController;
use App\Http\Controllers\CareGivers\AuthCareGiverController;
use App\Http\Controllers\CareGivers\CareGiverChatController;
use App\Http\Controllers\MainSite\TermsConditionsController;
use App\Http\Controllers\FamilyMember\FamilyMemberController;
use App\Http\Controllers\Admin\AdminCareBeneficiaryController;
use App\Http\Controllers\CareGivers\CareGiversBookingController;
use App\Http\Controllers\CareGivers\CareGiverDashboardController;
use App\Http\Controllers\FamilyMember\AuthFamilyMemberController;
use App\Http\Controllers\FamilyMember\FamilyMemberChatController;
use App\Http\Controllers\MainSite\ServiceUsersRegisterController;
use App\Http\Controllers\Admin\AdminEligibilityQuestionController;
use App\Http\Controllers\FamilyMember\FamilyMemberBookingController;
use App\Http\Controllers\CareGivers\CareGiverKnowledgeBaseController;
use App\Http\Controllers\FamilyMember\FamilyMemberDashboardController;
use App\Http\Controllers\CareBeneficiary\AuthCareBeneficiaryController;
use App\Http\Controllers\CareBeneficiary\CareBeneficiaryChatController;
use App\Http\Controllers\FamilyMember\FamilyMemberEligibilityController;
use App\Http\Controllers\CareBeneficiary\CareBeneficiaryBookingController;
use App\Http\Controllers\FamilyMember\FamilyMemberKnowledgeBaseController;
use App\Http\Controllers\CareBeneficiary\CareBeneficiaryDashboardController;
use App\Http\Controllers\CareBeneficiary\CareBeneficiaryEligibilityController;
use App\Http\Controllers\CareBeneficiary\CareBeneficiaryFamilyMemberController;
use App\Http\Controllers\CareBeneficiary\CareBeneficiaryKnowledgeBaseController;

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



// CAREBENEFICIARY USERS ROUTES
Route::prefix('carebeneficiary')->middleware(CareBeneficiaryMiddleware::class)->name('carebeneficiary.')->group(function () {

    Route::get('/dashboard', [CareBeneficiaryDashboardController::class, 'index'])->name('dashboard');
 
    // CHAT
    Route::get('/chat/list', [CareBeneficiaryChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/show/{chatId}', [CareBeneficiaryChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/store', [CareBeneficiaryChatController::class, 'storeChat'])->name('chat.store');
    Route::post('/chat/{chatId}/send', [CareBeneficiaryChatController::class, 'sendMessage'])->name('message.send');


    // KNOWLEDGE BASE
    Route::get('/knowledgebase/list', [CareBeneficiaryKnowledgeBaseController::class, 'index'])->name('knowledgebase.index');
    Route::get('/knowledgebase/{id}/show', [CareBeneficiaryKnowledgeBaseController::class, 'show'])->name('knowledgebase.show');

    // AUTH USER
    Route::get('/auth-profile', [AuthCareBeneficiaryController::class, 'show'])->name('auth-profile.show');
    Route::get('/auth-profile/edit', [AuthCareBeneficiaryController::class, 'editProfile'])->name('auth-profile.edit');
    Route::post('/update-profile', [AuthCareBeneficiaryController::class, 'updateProfile'])->name('auth-profile.update');
    Route::get('/change-password', [AuthCareBeneficiaryController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/update-password', [AuthCareBeneficiaryController::class, 'updatePassword'])->name('update-password');

    // FMILY
    Route::get('/family-member', [CareBeneficiaryFamilyMemberController::class, 'index'])->name('family-member');
	Route::get('/family-member/profile/{id}', [CareBeneficiaryFamilyMemberController::class, 'showFamilyMemberProfile'])->name('family-member.show');
    Route::get('/family-member/unlink/{id}', [CareBeneficiaryFamilyMemberController::class, 'unlinkFamilyMember'])->name('family-member.unlink');

    // ELIGIBILITY
    Route::get('/eligibility/show', [CareBeneficiaryEligibilityController::class, 'showEligibilityForm'])->name('eligibility.show');
    Route::post('/eligibility/save', [CareBeneficiaryEligibilityController::class, 'saveEligibilityFormResponse'])->name('eligibility.save');
 

    // BOOKINGS
    Route::get('/bookings/', [CareBeneficiaryBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [CareBeneficiaryBookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store', [CareBeneficiaryBookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/show/{id}', [CareBeneficiaryBookingController::class, 'show'])->name('bookings.show');
    Route::post('/bookings/{id}/select-carers', [CareBeneficiaryBookingController::class, 'selectCarers'])->name('bookings.selectCarers');

    Route::get('/care-givers/show/{id}', [CareBeneficiaryBookingController::class, 'showCareGiver'])->name('caregivers.show');

});






//FAMILY MEMBER USERS ROUTES
Route::prefix('familymember')->middleware(FamilyMemberMiddleware::class)->name('familymember.')->group(function () {


    Route::get('/dashboard', [FamilyMemberDashboardController::class, 'index'])->name('dashboard');

    // CHAT
    Route::get('/chat/list', [FamilyMemberChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/show/{chatId}', [FamilyMemberChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/store', [FamilyMemberChatController::class, 'storeChat'])->name('chat.store');
    Route::post('/chat/{chatId}/send', [FamilyMemberChatController::class, 'sendMessage'])->name('message.send');

    
    // KNOWLEDGE BASE
    Route::get('/knowledgebase/list', [FamilyMemberKnowledgeBaseController::class, 'index'])->name('knowledgebase.index');
    Route::get('/knowledgebase/{id}/show', [FamilyMemberKnowledgeBaseController::class, 'show'])->name('knowledgebase.show');


    // AUTH USER
    Route::get('/auth-profile', [AuthFamilyMemberController::class, 'show'])->name('auth-profile.show');
    Route::get('/auth-profile/edit', [AuthFamilyMemberController::class, 'editProfile'])->name('auth-profile.edit');
    Route::post('/update-profile', [AuthFamilyMemberController::class, 'updateProfile'])->name('auth-profile.update');
    Route::get('/change-password', [AuthFamilyMemberController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/update-password', [AuthFamilyMemberController::class, 'updatePassword'])->name('update-password');

    // ELIGIBILITY
    Route::get('/eligibility/care-beneficiary/list', [FamilyMemberEligibilityController::class, 'EligibilityFamilyList'])->name('eligibility.care-beneficiary');
    Route::get('/eligibility/show/{userId}', [FamilyMemberEligibilityController::class, 'showEligibilityForm'])->name('eligibility.show');
    Route::post('/eligibility/save/{userId}', [FamilyMemberEligibilityController::class, 'saveEligibilityFormResponse'])->name('eligibility.save');


    // FMILY
    Route::get('/care-beneficiary', [FamilyMemberController::class, 'index'])->name('care-beneficiary');
    Route::get('/care-beneficiary/add', [FamilyMemberController::class, 'showAddFamilyMemberForm'])->name('care-beneficiary.add');
    Route::post('/care-beneficiary/store', [FamilyMemberController::class, 'storeFamilyMember'])->name('care-beneficiary.store');
    Route::get('/care-beneficiary/profile/{id}', [FamilyMemberController::class, 'showFamilyMemberProfile'])->name('care-beneficiary.show');
    Route::get('/care-beneficiary/edit/{id}', [FamilyMemberController::class, 'editFamilyMember'])->name('care-beneficiary.edit');
    Route::post('/care-beneficiary/update/{id}', [FamilyMemberController::class, 'updateFamilyMember'])->name('care-beneficiary.update');
    Route::get('/care-beneficiary/unlink/{id}', [FamilyMemberController::class, 'unlinkFamilyMember'])->name('care-beneficiary.unlink');


    // BOOKINGS 
    Route::get('/bookings/family-member/list', [FamilyMemberBookingController::class, 'BookingFamilyList'])->name('bookings.family-member.list');

    Route::get('/bookings/care-beneficiary/{userId}', [FamilyMemberBookingController::class, 'index'])->name('bookings.care-beneficiary.index');
    Route::get('/bookings/care-beneficiary/{userId}/create', [FamilyMemberBookingController::class, 'create'])->name('bookings.care-beneficiary.create');
    Route::post('/bookings/care-beneficiary/{userId}/store', [FamilyMemberBookingController::class, 'store'])->name('bookings.care-beneficiary.store');
    Route::get('/bookings/care-beneficiary/{userId}/show/{id}', [FamilyMemberBookingController::class, 'show'])->name('bookings.care-beneficiary.show');
    Route::post('/bookings/care-beneficiary/{userId}/select-carers/{id}', [FamilyMemberBookingController::class, 'selectCarers'])->name('bookings.care-beneficiary.selectCarers');


    // SHOW CARE GIVER
    Route::get('/care-givers/show/{id}', [FamilyMemberBookingController::class, 'showCareGiver'])->name('caregivers.show');

});


// CARE GIVERS ROUTES
Route::prefix('caregiver')->middleware(CareGiverMiddleware::class)->name('caregiver.')->group(function () {

    Route::get('/dashboard', [CareGiverDashboardController::class, 'index'])->name('dashboard');

    // CHAT
    Route::get('/chat/list', [CareGiverChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/show/{chatId}', [CareGiverChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/store', [CareGiverChatController::class, 'storeChat'])->name('chat.store');
    Route::post('/chat/{chatId}/send', [CareGiverChatController::class, 'sendMessage'])->name('message.send');



    // KNOWLEDGE BASE
    Route::get('/knowledgebase/list', [CareGiverKnowledgeBaseController::class, 'index'])->name('knowledgebase.index');
    Route::get('/knowledgebase/{id}/show', [CareGiverKnowledgeBaseController::class, 'show'])->name('knowledgebase.show');



    // AUTH USER
    Route::get('/auth-profile', [AuthCareGiverController::class, 'show'])->name('auth-profile.show');
    Route::get('/auth-profile/edit', [AuthCareGiverController::class, 'editProfile'])->name('auth-profile.edit');
    Route::post('/update-profile', [AuthCareGiverController::class, 'updateProfile'])->name('auth-profile.update');
    Route::get('/change-password', [AuthCareGiverController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/update-password', [AuthCareGiverController::class, 'updatePassword'])->name('update-password');


    // BOOKINGS
    Route::get('/bookings/', [CareGiversBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/show/{id}', [CareGiversBookingController::class, 'show'])->name('bookings.show');
    Route::put('/bookings/assignment/{id}/accept', [CareGiversBookingController::class, 'acceptResponse'])->name('bookings.acceptResponse');
    Route::put('/bookings/assignment/{id}/cancel', [CareGiversBookingController::class, 'cancelResponse'])->name('bookings.cancelResponse');


});



// ADMIN ROUTES
Route::prefix('admin')->middleware(AdminMiddleware::class)->name('admin.')->group(function () {


	Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // AUTH USER
    Route::get('/auth-profile', [AuthAdminProfileController::class, 'show'])->name('auth-profile.show');
    Route::get('/auth-profile/edit', [AuthAdminProfileController::class, 'editProfile'])->name('auth-profile.edit');
    Route::post('/update-profile', [AuthAdminProfileController::class, 'updateProfile'])->name('auth-profile.update');
    Route::get('/change-password', [AuthAdminProfileController::class, 'showChangePasswordForm'])->name('change-password');
    Route::post('/update-password', [AuthAdminProfileController::class, 'updatePassword'])->name('update-password');



    // CHAT
    Route::get('/chat/list', [AdminChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/show/{chatId}', [AdminChatController::class, 'show'])->name('chat.show');
    Route::get('/chat/create', [AdminChatController::class, 'CreateChat'])->name('chat.create');
    Route::post('/chat/store', [AdminChatController::class, 'storeChat'])->name('chat.store');
    Route::post('/chat/{chatId}/send', [AdminChatController::class, 'sendMessage'])->name('message.send');
    Route::get('/chat/{chatId}/edit', [AdminChatController::class, 'edit'])->name('chat.edit');
    Route::post('/chat/{chatId}/update', [AdminChatController::class, 'update'])->name('chat.update');
    Route::delete('/chat/{chatId}/delete', [AdminChatController::class, 'deleteChat'])->name('chat.delete');



    // BENEFICIARY USERS
    Route::get('/care-beneficiary/list', [AdminCareBeneficiaryController::class, 'index'])->name('care-beneficiary.index'); 
    Route::get('/care-beneficiary/create', [AdminCareBeneficiaryController::class, 'create'])->name('care-beneficiary.create');
    Route::post('/care-beneficiary/store', [AdminCareBeneficiaryController::class, 'store'])->name('care-beneficiary.store');  
    Route::get('/care-beneficiary/show/{id}', [AdminCareBeneficiaryController::class, 'show'])->name('care-beneficiary.show'); 

    
    // FAMILY MEMBER USERS 
    Route::get('/familymember/list', [AdminFamilyMemberController::class, 'index'])->name('familymember.index'); 
    Route::get('/familymember/create', [AdminFamilyMemberController::class, 'create'])->name('familymember.create');
    Route::post('/familymember/store', [AdminFamilyMemberController::class, 'store'])->name('familymember.store');  
    Route::get('/familymember/show/{id}', [AdminFamilyMemberController::class, 'show'])->name('familymember.show'); 


    // CARE GIVER USERS
    Route::get('/care-givers/list', [AdminCareGiversController::class, 'index'])->name('caregivers.index');
    Route::get('/care-givers/show/{id}', [AdminCareGiversController::class, 'show'])->name('caregivers.show');
    Route::get('/care-givers/create', [AdminCareGiversController::class, 'create'])->name('caregivers.create');
    Route::post('/care-givers/store', [AdminCareGiversController::class, 'store'])->name('caregivers.store');

    

    // ELIGIBILITY RESPONSES
    Route::get('/eligibility-requests/list', [AdminEligibilityController::class, 'index'])->name('eligibility-request');     
    Route::get('/eligibility-requests/show/{user_id}', [AdminEligibilityController::class, 'show'])->name('eligibility-request.show');
    Route::post('/eligibility-requests/review/{user_id}', [AdminEligibilityController::class, 'submitReview'])->name('eligibility-request.review');
    Route::delete('/eligibility-requests/delete/{user_id}', [AdminEligibilityController::class, 'deleteEligibility'])->name('eligibility-request.delete');


    // ELIGIBILITY QUESTIONS
    Route::get('/eligibility-questions/', [AdminEligibilityQuestionController::class, 'index'])->name('eligibility-questions.index');
    Route::get('/eligibility-questions/create', [AdminEligibilityQuestionController::class, 'create'])->name('eligibility-questions.create');
    Route::post('/eligibility-questions/store', [AdminEligibilityQuestionController::class, 'store'])->name('eligibility-questions.store');
    Route::get('/eligibility-questions/{id}', [AdminEligibilityQuestionController::class, 'show'])->name('eligibility-questions.show');
    Route::delete('/eligibility-questions/{id}/delete', [AdminEligibilityQuestionController::class, 'destroy'])->name('eligibility-questions.destroy');


    // FAMILY MANAGE
    Route::post('/family-members/unlink', [AdminFamilyMembersController::class, 'unlink'])->name('family-members.unlink');
    Route::post('/family-members/update', [AdminFamilyMembersController::class, 'update'])->name('family-members.update');
    Route::get('/family-members/search/{role}/{user_id}', [AdminFamilyMembersController::class, 'searchServiceUser'])->name('family-members.search');
    Route::post('/family-members/add', [AdminFamilyMembersController::class, 'addFamilyMember'])->name('family-members.add');

    

    // ADMIN USERS
    Route::get('/users/list', [AdminUsersController::class, 'index'])->name('users.index');
    Route::get('/users/show/{id}', [AdminUsersController::class, 'show'])->name('users.show');
    Route::get('/users/create', [AdminUsersController::class, 'create'])->name('users.create');
    Route::post('/users/store', [AdminUsersController::class, 'store'])->name('users.store');



    // KNOWLEDGE BASE
    Route::get('/knowledgebase/list', [AdminKnowledgeBaseController::class, 'index'])->name('knowledgebase.index');
    Route::get('/knowledgebase/create', [AdminKnowledgeBaseController::class, 'create'])->name('knowledgebase.create');
    Route::post('/knowledgebase/store', [AdminKnowledgeBaseController::class, 'store'])->name('knowledgebase.store');
    Route::get('/knowledgebase/{id}/edit', [AdminKnowledgeBaseController::class, 'edit'])->name('knowledgebase.edit');
    Route::put('/knowledgebase/{id}/update', [AdminKnowledgeBaseController::class, 'update'])->name('knowledgebase.update');
    Route::delete('/knowledgebase/{id}/delete', [AdminKnowledgeBaseController::class, 'destroy'])->name('knowledgebase.destroy');
    Route::get('/knowledgebase/{id}/show', [AdminKnowledgeBaseController::class, 'show'])->name('knowledgebase.show');
    Route::delete('/knowledgebase/{id}/delete-attachment', [AdminKnowledgeBaseController::class, 'deleteAttachment'])->name('knowledgebase.deleteAttachment');



    // BOOKING
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/user_id/{userId}', [AdminBookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/store/user_id/{userId}', [AdminBookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/show/{id}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{id}/assign-carers', [AdminBookingController::class, 'assignCarers'])->name('bookings.assign');
    Route::post('/bookings/{id}/assign-carers', [AdminBookingController::class, 'storeAssignedCarers'])->name('bookings.storeAssignedCarers');
    Route::post('/bookings/{id}/approve', [AdminBookingController::class, 'approveBooking'])->name('bookings.approve');

    Route::get('/bookings/{id}/edit', [AdminBookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}/update', [AdminBookingController::class, 'update'])->name('bookings.update');

    Route::delete('/bookings/{bookingId}/carers/{id}/remove', [AdminBookingController::class, 'removeAssignedCarer'])->name('bookings.removeCarer');
    Route::put('/bookings/assignments/{id}/update', [AdminBookingController::class, 'updateAssignedCarer'])->name('bookings.updateAssignment');
    Route::post('/bookings/{id}/cancel', [AdminBookingController::class, 'cancelBooking'])->name('bookings.cancel');

});


// ADMIN ROUTES LEVEL 2 ROUTES
Route::middleware(AdminLevel2Middleware::class)->group(function () {
    //Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');

});

 